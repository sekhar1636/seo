@extends('layouts.app')
@section('content')        
    <section class="headturbo" id="headturbo">
        <div class="headturbo-wrap" id="headturbo-wrap-home">
            <div class="texture-overlay"></div>
            <div class="container">
                <div class="row">
                    <div style="height: 870px;" class="headturbo-img pull-right hidden-xs"></div>
                    <div class="col-md-12 text-center">
                        <div class="headturbo-content">
                            <h1 class="pulse">Instantly Analyze Your SEO Issues</h1>
                            <h2>Helps to identify your SEO mistakes and better optimize your site content.</h2>
                            <form class="turboform" method="POST" action="#" onsubmit="return fixURL();">
                                <div class="input-group review">
                                    <input type="text" autocomplete="off" spellcheck="false" class="form-control" placeholder="Type Your Website Address" name="url" />
                                    <span class="input-group-btn">
                                        <button class="btn btn-green" type="submit" id="review-btn">
                                            <span class="glyphicon glyphicon-search"></span> REVIEW
                                        </button>
                                    </span>
                                </div>
                            </form>
                            <br />
                            <ul class="top-link list-inline">
                                <li><a href="#"><i class="fa fa-apple"></i> Apple</a></li>
                                <li><a href="#"><i class="fa fa-facebook-official"></i> Facebook</a></li>
                                <li><a href="#"><i class="fa fa-yc-square"></i> Yahoo</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
    <div class="bg-grey-color">
        <!-- begin .container -->
        <div class="container">        
            <ul id="featured">
                <li>
                    <span class="circleBox"><span class="fa fa-line-chart"></span></span>
                    <h4>Unlimited Analysis</h4>
                    <p>Run unlimited analysis on our most powerful servers. Stored reports make it easy to view progress and past work.</p>
                </li>
                <li>
                    <span class="circleBox"><span class="fa fa-server"></span></span>
                    <h4>In-Depth Reviews</h4>
                    <p>With our in-depth website analysis learn how to fix your SEO issues with clear definitions for each SEO metrics.</p>
                </li>
                <li>
                    <span class="circleBox"><span class="fa fa-thumbs-o-up"></span></span>
                    <h4>Competitive Analysis</h4>
                    <p>Side-by-side SEO comparisons with your competitors. See how your SEO can improve against the competition.</p>
                </li>
            </ul>        
        </div>
        <!-- end .container -->    
    </div>
    <div class="container">
        <div class="row">
            <div id="latest-site">
                <div class="col-md-12">
                    <div class="latest-heading">
                        <h4><span class="heading-icon"><i class="fa fa-envira"></i></span>Recently Listed</h4>
                        <a class="btn btn-primary btn-sm pull-right" href="#">View More <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
                <div class="row latest-content">
                    <div class="col-md-4">
                        <div class="sites-block">
                            <a rel="nofollow" href="#">
                                <img alt="lifetimebpo.weebly.com" src="#" class="image-overlay" />
                            </a>
                            <div class="caption">
                                <a href="#">Lifetimebpo.weebly.com</a>
                            </div>
                            <div class="details clearfix">
                                <span><strong class="recentStrong">60<span style="font-size: 12px;">/100</span></strong>Score</span>
                                <span><strong class="recentStrong">0</strong>Global Rank</span>
                                <span><strong class="recentStrong">83%</strong>Page Speed</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sites-block">
                            <a rel="nofollow" href="#">
                                <img alt="bouture-cbd.ch" src="#" class="image-overlay" />
                            </a>
                            <div class="caption">
                                <a href="#">Bouture-cbd.ch</a>
                            </div>
                            <div class="details clearfix">
                                <span><strong class="recentStrong">75<span style="font-size: 12px;">/100</span></strong>Score</span>
                                <span><strong class="recentStrong">0</strong>Global Rank</span>
                                <span><strong class="recentStrong">92%</strong>Page Speed</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sites-block">
                            <a rel="nofollow" href="#">
                                <img alt="mytechnology.ae" src="#" class="image-overlay" />
                            </a>
                            <div class="caption">
                                <a href="#">Mytechnology.ae</a>
                            </div>
                            <div class="details clearfix">
                                <span><strong class="recentStrong">45<span style="font-size: 12px;">/100</span></strong>Score</span>
                                <span><strong class="recentStrong">3,178,135</strong>Global Rank</span>
                                <span><strong class="recentStrong">37%</strong>Page Speed</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row latest-content">
                    <div class="col-md-4">
                        <div class="sites-block">
                            <a rel="nofollow" href="#">
                                <img alt="ndtv.com" src="#" class="image-overlay" />
                            </a>
                            <div class="caption">
                                <a href="#">Ndtv.com</a>
                            </div>
                            <div class="details clearfix">
                                <span><strong class="recentStrong">54<span style="font-size: 12px;">/100</span></strong>Score</span>
                                <span><strong class="recentStrong">385</strong>Global Rank</span>
                                <span><strong class="recentStrong">60%</strong>Page Speed</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sites-block">
                            <a rel="nofollow" href="#">
                                <img alt="beeontrack.ae" src="#" class="image-overlay" />
                            </a>
                            <div class="caption">
                                <a href="#">Beeontrack.ae</a>
                            </div>
                            <div class="details clearfix">
                                <span><strong class="recentStrong">63<span style="font-size: 12px;">/100</span></strong>Score</span>
                                <span><strong class="recentStrong">5,849,625</strong>Global Rank</span>
                                <span><strong class="recentStrong">72%</strong>Page Speed</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sites-block">
                            <a rel="nofollow" href="#">
                                <img alt="myntra.com" src="#" class="image-overlay" />
                            </a>
                            <div class="caption">
                                <a href="#">Myntra.com</a>
                            </div>
                            <div class="details clearfix">
                                <span><strong class="recentStrong">57<span style="font-size: 12px;">/100</span></strong>Score</span>
                                <span><strong class="recentStrong">959</strong>Global Rank</span>
                                <span><strong class="recentStrong">67%</strong>Page Speed</span>
                            </div>
                        </div>
                    </div>
                </div>                
          </div>
      </div>
</div>
@endsection