@extends('common.layout')
@section('title', 'Buy Products')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/css/formValidation.min.css')}}">
    <style type="text/css">
        .activeBox{
            border:1px solid rgba(68,182,174,1);
        }
        .inactiveBox{
            border:1px solid rgb(234, 190, 189);
        }
    </style>
@endsection
@section('js')
    {{--<script src="//asset('assets/apps/scripts/timeline.min.js')}}" type="text/javascript"></script>--}}
    <script src="https://js.stripe.com/v2/"></script>
    <script>
        $(document).ready(function() {
            $('.pls').click(function(){
                var as= $(this).attr('data-type');
                var val = $('#'+as).val();
              var vval = parseInt(val)+parseInt(1);
              $('#'+as).val(vval);
              $('#r'+as).val(vval);
            });
           // var v = $('.pricedetct').find(":selected").text();
           // console.log(v);
            $('.mins').click(function(){
                var aas = $(this).attr('data-type');
                var valec = $('#'+aas).val();
                if(parseInt(valec) == parseInt(1))
               {
                 alert('You must atleast purchase a single one!');
                 return false;
               }
               else{
                   var minn = parseInt(valec)-parseInt(1);
               }
                $('#'+aas).val(minn);
                $('#r'+aas).val(minn);
            });
            // Change the key to your one
            Stripe.setPublishableKey("<?php echo $_ENV['STRIPE_KEY']; ?>");
            $('.button-checkbox').each(function () {
                // Settings
                var $widget = $(this),
                    $button = $widget.find('button'),
                    $checkbox = $widget.find('input:checkbox'),
                    color = $button.data('color'),
                    settings = {
                        on: {
                            icon: 'glyphicon glyphicon-check'
                        },
                        off: {
                            icon: 'glyphicon glyphicon-unchecked'
                        }
                    };
                // Event Handlers
                $button.on('click', function () {
                    $checkbox.prop('checked', !$checkbox.is(':checked'));
                    $checkbox.triggerHandler('change');
                    updateDisplay();
                });
                $checkbox.on('change', function () {
                    updateDisplay();
                });
                // Actions
                function updateDisplay() {
                    var isChecked = $checkbox.is(':checked');
                    // Set the button's state
                    $button.data('state', (isChecked) ? "on" : "off");
                    // Set the button's icon
                    $button.find('.state-icon')
                        .removeClass()
                        .addClass('state-icon ' + settings[$button.data('state')].icon);
                    // Update the button's color
                    if (isChecked) {
                        $button
                            .removeClass('btn-default')
                            .addClass('btn-' + color + ' active');
                    }
                    else {
                        $button
                            .removeClass('btn-' + color + ' active')
                            .addClass('btn-default');
                    }
                }
                // Initialization
                function init() {
                    updateDisplay();
                    // Inject the icon if applicable
                    if ($button.find('.state-icon').length == 0) {
                        $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
                    }
                }
                init();
            });
            $('#paymentForm')
                .formValidation({
                    framework: 'bootstrap',
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                        ccNumber: {
                            selector: '[data-stripe="number"]',
                            validators: {
                                notEmpty: {
                                    message: 'The credit card number is required'
                                },
                                creditCard: {
                                    message: 'The credit card number is not valid'
                                }
                            }
                        },
                        expMonth: {
                            selector: '[data-stripe="exp-month"]',
                            row: '.col-xs-3',
                            validators: {
                                notEmpty: {
                                    message: 'The expiration month is required'
                                },
                                digits: {
                                    message: 'The expiration month can contain digits only'
                                },
                                callback: {
                                    message: 'Expired',
                                    callback: function(value, validator) {
                                        value = parseInt(value, 10);
                                        var year         = validator.getFieldElements('expYear').val(),
                                            currentMonth = new Date().getMonth() + 1,
                                            currentYear  = new Date().getFullYear();
                                        if (value < 0 || value > 12) {
                                            return false;
                                        }
                                        if (year == '') {
                                            return true;
                                        }
                                        year = parseInt(year, 10);
                                        if (year > currentYear || (year == currentYear && value >= currentMonth)) {
                                            validator.updateStatus('expYear', 'VALID');
                                            return true;
                                        } else {
                                            return false;
                                        }
                                    }
                                }
                            }
                        },
                        expYear: {
                            selector: '[data-stripe="exp-year"]',
                            row: '.col-xs-3',
                            validators: {
                                notEmpty: {
                                    message: 'The expiration year is required'
                                },
                                digits: {
                                    message: 'The expiration year can contain digits only'
                                },
                                callback: {
                                    message: 'Expired',
                                    callback: function(value, validator) {
                                        value = parseInt(value, 10);
                                        var month        = validator.getFieldElements('expMonth').val(),
                                            currentMonth = new Date().getMonth() + 1,
                                            currentYear  = new Date().getFullYear();
                                        if (value < currentYear || value > currentYear + 100) {
                                            return false;
                                        }
                                        if (month == '') {
                                            return false;
                                        }
                                        month = parseInt(month, 10);
                                        if (value > currentYear || (value == currentYear && month >= currentMonth)) {
                                            validator.updateStatus('expMonth', 'VALID');
                                            return true;
                                        } else {
                                            return false;
                                        }
                                    }
                                }
                            }
                        },
                        cvvNumber: {
                            selector: '[data-stripe="cvc"]',
                            validators: {
                                notEmpty: {
                                    message: 'The CVV number is required'
                                },
                                cvv: {
                                    message: 'The value is not a valid CVV',
                                    creditCardField: 'ccNumber'
                                }
                            }
                        }
                    }
                })
                .on('success.form.fv', function(e,data) {
                    e.preventDefault();
                    var $form = $(e.target);
                    // Reset the token first
                    $form.find('[name="token"]').val('');
                    Stripe.card.createToken($form, function(status, response) {
                        if (response.error) {
                            alert(response.error.message);
                        } else {
                            // Set the token value
                            $form.find('[name="token"]').val(response.id);
                            fv    = $(e.target).data('formValidation');
                            fv.defaultSubmit();
                            //return true;
                        }
                    });
                });
        });
    </script>
@endsection
@section('content')
    <div class="page-content-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger {{{ Session::has('error_message')? '' : 'display-hide' }}}">
                    <button class="close" data-close="alert"></button>
                    <span>
                    {!! Session::has('error_message') ? Session::pull('error_message') : 'Please correct your fields.' !!}
                </span>
                </div>
                <div class="alert alert-success {{{ Session::has('success_message') ? '' : 'display-hide' }}}">
                    <button class="close" data-close="alert"></button>
                    <span>
                    {!! Session::has('success_message') ? Session::pull('success_message') : 'Please correct your fields.' !!}
                </span>
                </div>
                <div class="portlet light portlet-fit ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-doc font-green"></i>
                            <span class="caption-subject bold font-green uppercase">Products</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <form id="paymentForm" class="form-horizontal" method="post" action="{{route('theater::buyProduct')}}" >
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <?php $i=1; $j=1; ?>
                            @foreach($products as $product)
                                <div class="form-group" style="align-content: center; background-color:#EEE; padding:25px;">
                                    <label class="col-xs-3 control-label">{{$product->name}}</label>
                                    <div class="col-xs-5">
                                        <?php $r=$i++; $s=$j++; ?>
                                            <input name="products[{{$product->id}}][price]" type="hidden" id="r{{$r}}" value=""/>
                                        <select name="products[{{$product->id}}][varid]" id="select_id{{ $product->id }}" class="form-control pricedetct">
                                            @foreach($product->product_variant as $val)
                                                <option value="{{ $val['id'] }}" data-attr="{{ $val['price'] }}">{{ $val['product_variant'] ? 'Variant: '.$val['product_variant'] : 'No variant'}} {{ $val['price'] ? 'Price:'.$val['price'] : ' '  }}</option>
                                            @endforeach
                                        </select>
                                        <p class="product-description">{!!html_entity_decode($product->description)!!}</p>
                                        <span class="button-checkbox">
                                <button type="button" class="btn" data-color="primary">Add to Cart</button>
                                <input type="checkbox" class="hidden" name="products[{{$product->id}}][proid]" value="{{$product->id}}" />
                            </span>
                                        <a href="javascript" onclick="return false" data-type="{{$s}}" class="btn btn-icon-only red mins" id="mins[{{$s}}]"><i class="fa fa-minus"></i></a><input class="couunt" style="width: 10%; border: none; text-align: center;" type="text" name="couunt[{{$s}}]" id="{{$s}}" value="1"/><a href="javascript" onclick="return false" data-type="{{$r}}" class="btn btn-icon-only green pls" id="pls[{{$r}}]"><i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                            @endforeach
                            <div class="form-group">
                                <label class="col-xs-3 control-label">Credit card number</label>
                                <div class="col-xs-5">
                                    <input type="text" class="form-control" data-stripe="number" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 control-label">Expiration</label>
                                <div class="col-xs-3">
                                    <!--<input type="text" class="form-control" placeholder="Month" data-stripe="exp-month" />-->
                                    <select class="form-control" data-stripe="exp-month">
                      <option value="01">January</option>
                      <option value="02">February</option>
                      <option value="03">March</option>
                      <option value="04">April</option>
                      <option value="05">May</option>
                      <option value="06">June</option>
                      <option value="07">July</option>
                      <option value="08">August</option>
                      <option value="09">September</option>
                      <option value="10">October</option>
                      <option value="11">November</option>
                      <option value="12">December</option>
                      </select>
                                </div><?php
                $year = date('Y');
                ?>
 <div class="col-xs-2">
                    <select class="form-control" data-stripe="exp-year">
                    <?php for($i=$year; $i<($year+15); $i++){ ?>
                      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                      <!--<input type="text" class="form-control" placeholder="Year" data-stripe="exp-year" />-->
                    <?php } ?>
                    </select>
                </div>
              </div>
                            <div class="form-group">
                                <label class="col-xs-3 control-label">CVV</label>
                                <div class="col-xs-2">
                                    <input type="text" class="form-control" data-stripe="cvc" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 control-label">Address</label>
                                <div class="col-xs-5">
                                    <input type="text" class="form-control" data-stripe="address_line1" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 control-label">City</label>
                                <div class="col-xs-2">
                                    <input type="text" class="form-control" placeholder="Enter City" data-stripe="address_city" />
                                </div>
                                <label class="col-xs-1 control-label">Zip</label>
                                <div class="col-xs-2">
                                    <input type="text" class="form-control" placeholder="Enter Zip Code" data-stripe="address_zip" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 control-label">State</label>
                                <div class="col-xs-2">
                                    <!--<input type="text" class="form-control" placeholder="Enter State" data-stripe="address_state" />-->
                  <select class="form-control" data-stripe="address_state">
                  <?php foreach ($states as $state){?>
                    <option value="<?=trim($state)?>"><?=$state?></option>
                  <?php } ?>
                  </select>
                                </div>
                                <label class="col-xs-1 control-label">Country</label>
                                <div class="col-xs-2">
                                    <input type="text" class="form-control" placeholder="Enter Country" data-stripe="address_country" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-9 col-xs-offset-3">
                                    <button type="submit" class="btn btn-primary">Make Payment</button>
                                </div>
                            </div>
                            <input type="hidden" name="token" value="" />
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection