var StreamKarERP = (function(StreamKarERP) {

	var controlAI = 0;

	function getCheckColumn () {
		return {
			"name": "check",
			"width": "24px",
			"filterType": "check",
			"render": function(id) {
				return '<input type="checkbox" name="id[]" onchange="StreamKarERP.toggleRow(this)" value="' + id + '">';
			}
		};
	}

	function getBlankCheckColumn () {
		return {
			"name": "check",
			"width": "24px",
			"filterType": "check",
			"render": function(id) {
				return '';
			}
		};
	}

	function getBlankActions () {
		return {
			"name": "actions",
			"title": "Actions",
			"filterType": "actions",
			"width": "110px",
			"bSortable": false,
			"render": function(data) {
				return '';
			}
		};
	}

	var entityMap = {
		"&": "&amp;",
		"<": "&lt;",
		">": "&gt;",
		'"': '&quot;',
		"'": '&#39;',
		"/": '&#x2F;'
	};

	function sanitizeData(data) {
		return String(data).replace(/[&<>"'\/]/g, function (s) {
			return entityMap[s];
		});
		//return $('<div/>').text(data).html();
	}

	function sanitizeDollars(data) {
		return "$" + parseFloat(data);
	}

	function formatFileSize(bytes, si) {
		if(si === undefined) {
			si = true;
		}

		var thresh = si ? 1000 : 1024;
		if(Math.abs(bytes) < thresh) {
			return bytes + ' B';
		}
		var units = si
			? ['kB','MB','GB','TB','PB','EB','ZB','YB']
			: ['KiB','MiB','GiB','TiB','PiB','EiB','ZiB','YiB'];
		var u = -1;
		do {
			bytes /= thresh;
			++u;
		} while(Math.abs(bytes) >= thresh && u < units.length - 1);
		return bytes.toFixed(1)+' '+units[u];
	}

	function stripScripts(s) {
		var div = document.createElement('div');
		div.innerHTML = s;
		var scripts = div.getElementsByTagName('script');
		var i = scripts.length;
		while (i--) {
			scripts[i].parentNode.removeChild(scripts[i]);
		}
		return div.innerHTML;
	}

	function walkTheDom(node, func) {
		func(node);
		node = node.firstChild;
		while (node) {
			walkTheDOM(node, func);
			node = node.nextSibling;
		}
	}

	function getHtmlIdentifier(node) {
		var outer = node.outerHTML;
		var id = outer.substring(0, outer.indexOf('>')+1);
		var contents = "";
		for(var i = 0; i < node.childNodes.length; i++) {
			if(node.childNodes[i].nodeType == Node.TEXT_NODE) {
				contents += node.childNodes[i].textContent + " ";
			}
		}
		return $.trim((id + contents).replace(/[\n\r\s]+/, ' '));
	}

	function insertAtIndex(container, i, element) {
		if(i === 0) {
			container.prepend(element);        
			return;
		} else if(i == 'end') {
			container.append(element);        
			return;
		}

		container.children().eq(i-1).after(element);
	}

	function makeLabelHTML(value, text) {
		return '<span class="label label-sm ' + StreamKarERP.getLabelClass(value) + '">' + text + '</span>';
	}

	function makeLabel(data, type, row, meta) {
		prepareDatatableFilterOptions(data.options, meta.col, meta.settings.nTable);
		return makeLabelHTML(data.value, data.options[data.value]);
	}

	function sanitizeDropdown(data, type, row, meta) {
		prepareDatatableFilterOptions(data.options, meta.col, meta.settings.nTable);
		var text = sanitizeData(data.options[data.value]);
		return text;
	}

	function makeExcerpt(totalCharacters) {

		return function (data) {
			var data = sanitizeData(data);
			if(data.length <= totalCharacters) {
				return data;
			}
			data = data.substring(0, totalCharacters) + "...";
			return data;
		}
	}

	function escapeHTML(text) {
		var map = {
			'&': '&amp;',
			'<': '&lt;',
			'>': '&gt;',
			'"': '&quot;',
			"'": '&#039;'
		};

		return text.replace(/[&<>"']/g, function(m) { return map[m]; });
	}

	function getMapValue(map, value, defaultVal) {

		if(map.hasOwnProperty(value)) {
			return map[value];
		}
		return defaultVal;
	}

	function parseQuery(qstr) {
		var query = {};
		var a = qstr.substr(1).split('&');
		for (var i = 0; i < a.length; i++) {
			var b = a[i].split('=');
			query[decodeURIComponent(b[0])] = decodeURIComponent(b[1] || '');
		}
		return query;
	}

	function prepareDatatableActions (grid, container, actions) {
		var table = grid.getTableWrapper();

		var button = $('<div class="btn-group"> <a class="btn purple dropdown-toggle" href="javascript:;" data-toggle="dropdown"> <i class="fa fa-share"></i> <span class="hidden-480"> Actions </span> <i class="fa fa-angle-down"></i> </a> <ul class="dropdown-menu pull-right"> </ul> </div>');
		var menu = button.find(".dropdown-menu");

		var performAction = function(e) {
			e.preventDefault();
			var $this = $(this);
			var confirmation = $this.attr("data-confirmation");

			if (grid.getSelectedRowsCount() === 0) {
				Metronic.alert({
					type: 'danger',
					icon: 'warning',
					message: 'No record selected',
					container: grid.getTableWrapper(),
					place: 'prepend'
				});

				return;
			}

			var performance = function() {
				//var pageInfo = (grid.getDataTable().page.info());

				grid.setAjaxParam("action", $this.attr("data-value"));
				grid.setAjaxParam("actionGroup", grid.getSelectedRows());

				grid.getDataTable().ajax.reload(null, false);
				//grid.clearAjaxParams();
			}

			if(confirmation) {
				StreamKarERP.tinyModal("Confirm action", confirmation, [
					{
						"text": "Confirm",
						"class": "default red",
						"callback": performance,
					},
					{
						"text": "Cancel",
						"class": "default",
					},
				]);
			} else {
				performance();
			}

		}

		for(var j in actions) {
			var item = $('<li><a href="javascript:;"></a> </li>');
			item.find("a")
				.text(actions[j].name)
				.attr("data-confirmation", actions[j].confirmation)
				.attr("data-value", j)
				.val(j)
				.click(performAction);
			menu.append(item);
		}

		button.insertAfter(container.find("span:first"));
	}

	function prepareDatatableFilterOptions (data, column, table) {
		var filterCell = $(table).find("thead .filter td:eq(" + column + ")");
		if(filterCell.data("dropdown-populated") != true) {
			filterCell.data("dropdown-populated", true);

			var selector = filterCell.find("select");
			for(var i in data) {
				$("<option></option>")
					.val(i)
					.text(data[i])
					.appendTo(selector);
			}
		}

	}

	function prepareDatatableFilters (tableElement, columns) {
		//var columns = tableElement.dataTable().dataTableSettings[0].aoColumns;

		var headerRow = tableElement.find("tr.heading");
		var filterRow = $('<tr role="row" class="filter"></tr>');
		tableElement.find("thead:first").append(filterRow);

		var searchCell = null;

		for(var i in columns) {
			var column = columns[i];
			var filterCell = $("<td></td>");

			if("filterType" in column) {
				var name = column.name;

				if(column.search) {
					searchCell = filterCell;
				}

				if(column.filterType == "text") {
					var control = $('<input type="text" class="form-control form-filter input-sm" data-name="' + name + '" name="filter[' + name + '][value]" />');
					filterCell.append(control);

					if("filterValue" in column) {
						control.val(column.filterValue);
					}
					
				} else if(column.filterType == "dropdown") {
					var dropdown = $('<select type="text" class="form-control form-filter input-sm" data-name="' + name + '" name="filter[' + name + '][value]"></select>');
					dropdown.append('<option value="">Select...</option>');
					for(var j in column.filterData) {
						var option = $('<option value=""></option>');
						option.text(column.filterData[j]);
						option.val(j);
						dropdown.append(option);
					}
					filterCell.append(dropdown);

					if("filterValue" in column) {
						dropdown.val(column.filterValue);
					}

				} else if(column.filterType == "date") {

					var control = $('<div class="input-group date date-picker margin-bottom-5" data-date-format="mm/dd/yyyy"> <input type="text" class="form-control form-filter input-sm" data-name="' + name + '" data-from name="filter[' + name + '][value][from]" placeholder="From"> <span class="input-group-btn"> <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button> </span> </div> <div class="input-group date date-picker" data-date-format="mm/dd/yyyy"> <input type="text" class="form-control form-filter input-sm"  name="filter[' + name + '][value][to]" data-to placeholder="To"> <span class="input-group-btn"> <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button> </span> </div>');
					filterCell.append(control);

					if("filterValue" in column) {
						if("from" in column.filterValue) {
							control.find('[data-from]').val(column.filterValue.from);
						}
						if("to" in column.filterValue) {
							control.find('[data-to]').val(column.filterValue.to);
						}
					}

				} else if(column.filterType == "actions") {

					var control = $('<div class="margin-bottom-5"> <button class="btn btn-sm blue filter-submit margin-bottom"><i class="fa fa-search"></i> Search</button> </div> <button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i> Reset</button>');
					filterCell.append(control);

				} else if(column.filterType == "none") {

				}

				filterCell.append('<input type="hidden" class="form-filter" name="filter[' + name + '][type]" value="' + column.filterType + '" />');

			}

			if(i > 0) {
				headerRow.append("<th></th>");
			}
			filterRow.append(filterCell);
		}

		var params = parseQuery(document.location.search);
		for(var i in params) {
			filterRow.find("*[data-name='" + i + "']").val(params[i]);
		}

		filterRow.find("input, select, textarea").keyup(function(event){
			if(event.keyCode == 13){
				var $this = $(this);
				var filterRow = $this.parents(".filter:first");
				var button = filterRow.find(".filter-submit");
				button.click();
			} else if(event.keyCode == 27) {
				var $this = $(this);
				var filterRow = $this.parents(".filter:first");
				var button = filterRow.find(".filter-cancel");
				button.click();
			}
		});

		filterRow.find('.date-picker').datepicker({
			rtl: Metronic.isRTL(),
			autoclose: true,
			todayHighlight: true,
		});

		filterRow.find(".form-control.form-filter").change(function(){
			var value = $(this).val();
			if(value != "") {
				$(this).attr("data-filled", "");
			} else {
				$(this).removeAttr("data-filled");
			}
		}).change();

		if(searchCell) {
			var searchForm = $(".sidebar-search:first");
			searchForm.submit(function(e) {
				var value = $(this).find(".form-control:first").val();

				$(':input', filterRow)
					.not(':button, :submit, :reset, :hidden')
					.val('')
					.removeAttr('checked')
					.removeAttr('selected')
					.change();

				var input = searchCell.find("[data-name]");
				input.val(value).change();
				StreamKarERP.pulsate(input);

				filterRow.find(".filter-submit").click();

				e.preventDefault();
				return false;
			})
		}
	}

	function addDatatableRowSelector(tableElement) {
		tableElement.on("draw.dt", function() {
			var rows = tableElement.find("tbody tr[role='row']");

			rows.click(function(e) {
				if(e.target.tagName.toLowerCase() == "td") {
					var checkbox = $(this).find(".checker input");
					checkbox.click();
				}
			})
		});
	}

	// PUBLIC CLASSES

	StreamKarERP.HandleUsers = function() {

		var grid = new Datatable();
		var tableElement = $("#super_user_manage");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "username",
				"title": "Username",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "email",
				"title": "Email",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "description",
				"title": "Description",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "role",
				"title": "Role",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "status",
				"title": "Status",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "created_at",
				"title": "Created at",
				"filterType": "date",
				"width": "15%",
			},
			{
				"name": "actions",
				"title": "Actions",
				"filterType": "actions",
				"width": "18%",
				"bSortable": false,
				"render": function(data) {
					return '<a href="' + tableElement.find("input[name='edit_url']").val() + '/' 
										+ data + '" class="btn btn-xs default btn-editable"><i class="fa fa-pencil"></i> Edit</a>';
				}
			},
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
			"activate": {
				"name": "Activate",
				"confirmation": "Are you sure you want to activite that user?",
			},
			"deactivate": {
				"name": "Deactivate",
				"confirmation": "Are you sure you want to deactivite that user?",
			},
			"delete": {
				"name": "Delete",
				"confirmation": "Do you really want to delete the selected users?",
			},
			
			
			// "promote_to_admin": {
			// 	"name": "Promote",
			// 	"confirmation": "Do you really want to Promote the selected user(s) to admin.",
			// },
		});
	}

	StreamKarERP.HandleSpeakers = function() {

		var grid = new Datatable();
		var tableElement = $("#super_speaker_manage");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "name",
				"title": "Name",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "position",
				"title": "Position",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "location",
				"title": "Location",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "description",
				"title": "Description",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "status",
				"title": "Status",
				"filterType": "date",
				"width": "15%",
			},
			{
				"name": "actions",
				"title": "Actions",
				"filterType": "actions",
				"width": "18%",
				"bSortable": false,
				"render": function(data) {
					return '<a href="' + tableElement.find("input[name='edit_url']").val() + '/' 
										+ data + '" class="btn btn-xs default btn-editable"><i class="fa fa-pencil"></i> Edit</a>';
				}
			},
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
			"delete": {
				"name": "Deactivate",
				"confirmation": "Do you really want to deactivate the selected speakers?",
			},
			"activate": {
				"name": "Activate",
				"confirmation": "Do you really want to deactivate the selected speakers?",
			},
		});
	}


	StreamKarERP.HandleCourseContent = function() {

		var grid = new Datatable();
		var tableElement = $("#super_course_content_manage");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "title",
				"title": "Title",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "course.title",
				"title": "Course Name",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "scourse.name",
				"title": "Section Name",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "order",
				"title": "Order",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "actions",
				"title": "Actions",
				"filterType": "actions",
				"width": "18%",
				"bSortable": false,
				"render": function(data) {
					return '<a href="' + tableElement.find("input[name='edit_url']").val() + '/' 
										+ data + '" class="btn btn-xs default btn-editable"><i class="fa fa-pencil"></i> Edit</a>';
				}
			},
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
			"delete": {
				"name": "Delete",
				"confirmation": "Do you really want to delete the selected course content?",
			},
			
		});
	}

	StreamKarERP.HandleAssignments = function() {

		var grid = new Datatable();
		var tableElement = $("#super_assignment_manage");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "title",
				"title": "Title",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "course.title",
				"title": "Course Name",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "order",
				"title": "Order",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "actions",
				"title": "Actions",
				"filterType": "actions",
				"width": "18%",
				"bSortable": false,
				"render": function(data) {
					return '<a href="' + tableElement.find("input[name='edit_url']").val() + '/' 
										+ data + '" class="btn btn-xs default btn-editable"><i class="fa fa-pencil"></i> Edit</a>';
				}
			},
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
			"delete": {
				"name": "Delete",
				"confirmation": "Do you really want to delete the selected course content?",
			},
			
		});
	}

	StreamKarERP.HandleAForms = function() {

		var grid = new Datatable();
		var tableElement = $("#super_aforms_manage");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "user.username",
				"title": "Username",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "uuid",
				"title": "Form ID",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "actions",
				"title": "Actions",
				"filterType": "actions",
				"width": "18%",
				"bSortable": false,
				"render": function(data) {
					console.log(data);
					return '<a href="' + tableElement.find("input[name='view_url']").val() + '/' 
										+ data + '" class="btn btn-xs default btn-editable"><i class="fa fa-eye"></i> View Detail</a>';
				}
			},
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
			"delete": {
				"name": "Delete",
				"confirmation": "Do you really want to delete the selected course content?",
			},
			
		});
	}

	StreamKarERP.HandleRSessions = function() {

		var grid = new Datatable();
		var tableElement = $("#super_register_session_manage");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "user.username",
				"title": "Username",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "session.title",
				"title": "Session Title",
				"filterType": "text",
				"render": sanitizeData,
			}
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
			"delete": {
				"name": "Delete",
				"confirmation": "Do you really want to delete the selected session user?",
			},
			
		});
	}


	StreamKarERP.HandleContacts = function() {

		var grid = new Datatable();
		var tableElement = $("#super_contact_manage");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "name",
				"title": "Name",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "email",
				"title": "Email",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "description",
				"title": "Description",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "created_at",
				"title": "Created at",
				"filterType": "date",
				"width": "15%",
			},
		
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
			"delete": {
				"name": "Delete",
				"confirmation": "Do you really want to delete the selected contacts?",
			},
		});
	}

	StreamKarERP.HandleSections = function() {

		var grid = new Datatable();
		var tableElement = $("#super_sections_manage");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "name",
				"title": "Name",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "order",
				"title": "Order",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "status",
				"title": "Status",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "created_at",
				"title": "Created at",
				"filterType": "date",
				"width": "15%",
			},
			{
				"name": "actions",
				"title": "Actions",
				"filterType": "actions",
				"width": "18%",
				"bSortable": false,
				"render": function(data) {
					return '<a href="' + tableElement.find("input[name='edit_url']").val() + '/' 
										+ data + '" class="btn btn-xs default btn-editable"><i class="fa fa-pencil"></i> Edit</a>';
				}
			},
		
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
			"activate": {
				"name": "Activate",
				"confirmation": "Do you really want to activate this section?",
			},
			"deactivate": {
				"name": "Deactivate",
				"confirmation": "Do you really want to deactivate this section?",
			},
		});
	}

	StreamKarERP.HandleCourseSections = function() {

		var grid = new Datatable();
		var tableElement = $("#super_course_sections_manage");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "name",
				"title": "Name",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "order",
				"title": "Order",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "date",
				"title": "Date",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "status",
				"title": "Status",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "created_at",
				"title": "Created at",
				"filterType": "date",
				"width": "15%",
			},
			{
				"name": "actions",
				"title": "Actions",
				"filterType": "actions",
				"width": "18%",
				"bSortable": false,
				"render": function(data) {
					return '<a href="' + tableElement.find("input[name='edit_url']").val() + '/' 
										+ data + '" class="btn btn-xs default btn-editable"><i class="fa fa-pencil"></i> Edit</a>';
				}
			},
		
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
			"delete": {
				"name": "Delete",
				"confirmation": "Do you really want to delete the selected contacts?",
			},
		});
	}

		StreamKarERP.HandleRCourses = function() {

		var grid = new Datatable();
		var tableElement = $("#super_register_coursess_manage");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "user.username",
				"title": "Username",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "course.title",
				"title": "Course Name",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "created_at",
				"title": "Created at",
				"filterType": "date",
				"width": "15%",
			},
			// {
			// 	"name": "actions",
			// 	"title": "Actions",
			// 	"filterType": "actions",
			// 	"width": "18%",
			// 	"bSortable": false,
			// 	"render": function(data) {
			// 		return '';
			// },
		
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
			"delete": {
				"name": "Delete",
				"confirmation": "Do you really want to delete the selected register user course?",
			},
		});
	}

	StreamKarERP.HandleCourses = function() {

		var grid = new Datatable();
		var tableElement = $("#super_courses_manage");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "title",
				"title": "Title",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "speaker.name",
				"title": "Instructor",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "price",
				"title": "price",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "status",
				"title": "Status",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "created_at",
				"title": "Created at",
				"filterType": "date",
				"width": "15%",
			},
			{
				"name": "actions",
				"title": "Actions",
				"filterType": "actions",
				"width": "18%",
				"bSortable": false,
				"render": function(data) {
					return '<a href="' + tableElement.find("input[name='edit_url']").val() + '/' 
										+ data + '" class="btn btn-xs default btn-editable"><i class="fa fa-pencil"></i> Edit</a><a href="' + tableElement.find("input[name='resources_url']").val() + '/' 
										+ data + '" class="btn btn-xs btn-success btn-editable"><i class="fa fa-pencil"></i> Add Resources</a>';
				}
			},
		
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
			"delete": {
				"name": "Delete",
				"confirmation": "Do you really want to delete the selected contacts?",
			},
		});
	}

	StreamKarERP.HandleQuestions = function() {

		var grid = new Datatable();
		var tableElement = $("#super_question_manage");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "title",
				"title": "Title",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "section.name",
				"title": "Section Name",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "status",
				"title": "Status",
				"filterType": "text",
				"render": sanitizeData,
			},
			
			{
				"name": "created_at",
				"title": "Created at",
				"filterType": "date",
				"width": "15%",
			},
			{
				"name": "actions",
				"title": "Actions",
				"filterType": "actions",
				"width": "18%",
				"bSortable": false,
				"render": function(data) {
					return '<a href="' + tableElement.find("input[name='edit_url']").val() + '/' 
										+ data + '" class="btn btn-xs default btn-editable"><i class="fa fa-pencil"></i> Edit</a>';
				}
			},
		
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
			"activate": {
				"name": "Activate",
				"confirmation": "Do you really want to activate selected question?",
			},
			"deactivate": {
				"name": "Deactivate",
				"confirmation": "Do you really want to deactivate selected question?",
			},
		});
	}

	StreamKarERP.HandleAppSessions = function() {

		var grid = new Datatable();
		var tableElement = $("#super_app_session_manage");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "title",
				"title": "Title",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "venue",
				"title": "Venue",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "date",
				"title": "Date",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "time",
				"title": "Start Time",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "status",
				"title": "Status",
				"filterType": "text",
				"render": sanitizeData,
			},
			
			
			{
				"name": "actions",
				"title": "Actions",
				"filterType": "actions",
				"width": "18%",
				"bSortable": false,
				"render": function(data) {
					return '<a href="' + tableElement.find("input[name='edit_url']").val() + '/' 
										+ data + '" class="btn btn-xs default btn-editable"><i class="fa fa-pencil"></i> Edit</a>';
				}
			},
		
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
			"activate": {
				"name": "Activate",
				"confirmation": "Do you really want to activate selected sessions?",
			},
			"deactivate": {
				"name": "Deactivate",
				"confirmation": "Do you really want to deactivate selected sessions?",
			},
		});
	}

	StreamKarERP.HandleSliders = function() {

		var grid = new Datatable();
		var tableElement = $("#super_slider_manage");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "name",
				"title": "Name",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "created_at",
				"title": "Created at",
				"filterType": "date",
				"width": "15%",
			},
			{
				"name": "actions",
				"title": "Actions",
				"filterType": "actions",
				"width": "18%",
				"bSortable": false,
				"render": function(data) {
					return '<a href="' + tableElement.find("input[name='edit_url']").val() + '/' 
										+ data + '" class="btn btn-xs default btn-editable"><i class="fa fa-pencil"></i> Edit</a>';
				}
			},
		
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
			"delete": {
				"name": "Delete",
				"confirmation": "Do you really want to delete the selected images?",
			},
		});
	}

	StreamKarERP.HandleEvents = function() {

		var grid = new Datatable();
		var tableElement = $("#super_event_manage");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "title",
				"title": "Title",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "description",
				"title": "Description",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "created_at",
				"title": "Created at",
				"filterType": "date",
				"width": "15%",
			},
			{
				"name": "actions",
				"title": "Actions",
				"filterType": "actions",
				"width": "18%",
				"bSortable": false,
				"render": function(data) {
					return '<a href="' + tableElement.find("input[name='edit_url']").val() + '/' 
										+ data + '" class="btn btn-xs default btn-editable"><i class="fa fa-pencil"></i> Edit</a>';
				}
			},
		
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
			"delete": {
				"name": "Delete",
				"confirmation": "Do you really want to delete the selected events?",
			},
		});
	}


		StreamKarERP.HandleCompanies = function() {

		var grid = new Datatable();
		var tableElement = $("#super_companies_manage");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "title",
				"title": "Title",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "description",
				"title": "Description",
				"filterType": "text",
				"search": true,
				"render": makeExcerpt(120),
			},
			{
				"name": "address",
				"title": "Address",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "city",
				"title": "City",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "status",
				"title": "Status",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "created_at",
				"title": "Created at",
				"filterType": "date",
				"width": "15%",
			},
			{
				"name": "actions",
				"title": "Actions",
				"filterType": "actions",
				"width": "110px",
				"bSortable": false,
				"render": function(data) {
					return '<a href="' + tableElement.find("input[name='edit_url']").val() + '/' + data + '" class="btn btn-xs default btn-editable"><i class="fa fa-pencil"></i> Edit</a>';
				}
			},
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
			/*"activate": {
				"name": "Activate",
			},
			"deactivate": {
				"name": "Deactivate",
			},*/
			"delete": {
				"name": "Delete",
				"confirmation": "Do you really want to delete the selected users?",
			},
			"active": {
				"name": "Active",
			},
		});
	}

	// Handle Sessions//

		StreamKarERP.HandleSessions = function() {

		var grid = new Datatable();
		var tableElement = $("#super_session_manage");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "photo_url",
				"title": "Photo",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "user.username",
				"title": "Username",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "invoice.id",
				"title": "Invoice ID",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "started_at",
				"title": "Started At",
				"filterType": "date",
				"width": "25%",
			},
			{
				"name": "ended_at",
				"title": "Ended At",
				"filterType": "date",
				"width": "25%",
			},
			{
				"name": "actions",
				"title": "Actions",
				"filterType": "actions",
				"width": "110px",
				"bSortable": false,
				"render": function(data) {
					return '';
				}
			},
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
			/*"activate": {
				"name": "Activate",
			},
			"deactivate": {
				"name": "Deactivate",
			},*/
			"delete": {
				"name": "Delete",
				"confirmation": "Do you really want to delete the selected users?",
			},
		});
	}
	//Company Session start Here

	//Invoice Table Sstart Here

		StreamKarERP.HandleInvoices = function() {

		var grid = new Datatable();
		var tableElement = $("#super_invoice_manage");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "title",
				"title": "Title",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "company.title",
				"title": "Company Title",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "total",
				"title": "Total",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "status",
				"title": "Status",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "created_at",
				"title": "Created At",
				"filterType": "date",
				"width": "25%",
			},
			{
				"name": "actions",
				"title": "Actions",
				"filterType": "actions",
				"width": "110px",
				"bSortable": false,
				"render": function(data) {
					return '<a href="' + tableElement.find("input[name='view_url']").val() + '/' + data + '" class="btn btn-xs default btn-editable"><i class="fa fa-eye"></i> View</a>';
					
				}
			},
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
			"open": {
				"name": "Open",
			},
			"logged": {
				"name": "Logged",
			},
			"cleared": {
				"name": "Cleared",
			},
			"closed": {
				"name": "Closed",
			},
			"delete": {
				"name": "Delete",
				"confirmation": "Do you really want to delete the selected users?",
			},
		});
	}
	//Invoice Table End Here



	// Handle Sessions//

		StreamKarERP.HandleCompanySessions = function() {

		var grid = new Datatable();
		var tableElement = $("#company_session_manage");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "user.username",
				"title": "Username",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "started_at",
				"title": "Started At",
				"filterType": "date",
				"width": "25%",
			},
			{
				"name": "ended_at",
				"title": "Ended At",
				"filterType": "date",
				"width": "25%",
			},
			{
				"name": "actions",
				"title": "Actions",
				"filterType": "actions",
				"width": "110px",
				"bSortable": false,
				"render": function(data) {
					return '';
				}
			},
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
			/*"activate": {
				"name": "Activate",
			},
			"deactivate": {
				"name": "Deactivate",
			},*/
			// "delete": {
			// 	"name": "Delete",
			// 	"confirmation": "Do you really want to delete the selected users?",
			// },
		});
	}

	//Company Session End Here
	
	//Session Trash Start HEre
	// Handle Sessions//

		StreamKarERP.HandleSessionsTrash = function() {

		var grid = new Datatable();
		var tableElement = $("#super_session_trash_manage");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "photo_url",
				"title": "Photo",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "user.username",
				"title": "Username",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "invoice.id",
				"title": "Invoice ID",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "started_at",
				"title": "Started At",
				"filterType": "date",
				"width": "25%",
			},
			{
				"name": "ended_at",
				"title": "Ended At",
				"filterType": "date",
				"width": "25%",
			},
			{
				"name": "actions",
				"title": "Actions",
				"filterType": "actions",
				"width": "110px",
				"bSortable": false,
				"render": function(data) {
					return '';
				}
			},
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
			/*"activate": {
				"name": "Activate",
			},
			"deactivate": {
				"name": "Deactivate",
			},*/
			"delete": {
				"name": "Delete",
				"confirmation": "Do you really want to delete the selected users?",
			},
		});
	}
	//Session Trash End Here
	// Handle Device Request//

		StreamKarERP.HandleDeviceRequest = function() {

		var grid = new Datatable();
		var tableElement = $("#super_device_request_manage");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "user.username",
				"title": "Name",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "internel_id",
				"title": "Internel ID",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "name",
				"title": "Device Name",
				"filterType": "text",
				"render": sanitizeData,
			},
			
			{
				"name": "actions",
				"title": "Actions",
				"filterType": "actions",
				"width": "110px",
				"bSortable": false,
				"render": function(data) {
					return '';
				}
			},
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
		
			"approve": {
				"name": "Approve",
			},
			"delete": {
				"name": "Delete",
				"confirmation": "Do you really want to delete the selected users?",
			},
		});
	}

	// Handle Device Request//
	//Handle Company Device Request
	// Handle Device Request//

		StreamKarERP.HandleCompanyDeviceRequest = function() {

		var grid = new Datatable();
		var tableElement = $("#company_device_request_manage");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "user.username",
				"title": "Name",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "internel_id",
				"title": "Internel ID",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "name",
				"title": "Device Name",
				"filterType": "text",
				"render": sanitizeData,
			},
			
			{
				"name": "actions",
				"title": "Actions",
				"filterType": "actions",
				"width": "110px",
				"bSortable": false,
				"render": function(data) {
					return '';
				}
			},
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
		
			"approve": {
				"name": "Approve",
			},
			"delete": {
				"name": "Delete",
				"confirmation": "Do you really want to delete the selected device?",
			},
		});
	}

	//Handle Company Device Request


		StreamKarERP.HandleDeviceApproved = function() {

		var grid = new Datatable();
		var tableElement = $("#super_device_approved_manage");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "user.username",
				"title": "Name",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "internel_id",
				"title": "Internel ID",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "name",
				"title": "Device Name",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "created_at",
				"title": "Created at",
				"filterType": "date",
				"width": "15%",
			},
			{
				"name": "actions",
				"title": "Actions",
				"filterType": "actions",
				"width": "110px",
				"bSortable": false,
				"render": function(data) {
					return '';
				}
			},
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
			/*"activate": {
				"name": "Activate",
			},
			"deactivate": {
				"name": "Deactivate",
			},*/
			"delete": {
				"name": "Delete",
				"confirmation": "Do you really want to delete the selected users?",
			},
		});
	}

	//Handle Device Approved For Company

		StreamKarERP.HandleCompanyDeviceApproved = function() {

		var grid = new Datatable();
		var tableElement = $("#company_device_approved_manage");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "user.username",
				"title": "Name",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "internel_id",
				"title": "Internel ID",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "name",
				"title": "Device Name",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "created_at",
				"title": "Created at",
				"filterType": "date",
				"width": "15%",
			},
			{
				"name": "actions",
				"title": "Actions",
				"filterType": "actions",
				"width": "110px",
				"bSortable": false,
				"render": function(data) {
					return '';
				}
			},
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
			/*"activate": {
				"name": "Activate",
			},
			"deactivate": {
				"name": "Deactivate",
			},*/
			"delete": {
				"name": "Delete",
				"confirmation": "Do you really want to delete the selected users?",
			},
		});
	}
	//Handle Device Approved For Company Ends Here


	//Handle Company Users Start 
	// PUBLIC CLASSES

	StreamKarERP.HandleCompanyUsers = function() {

		var grid = new Datatable();
		var tableElement = $("#super_company_user_manage");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "username",
				"title": "Username",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "email",
				"title": "Email",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "role",
				"title": "Role",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "company.title",
				"title": "Company",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "created_at",
				"title": "Created at",
				"filterType": "date",
				"width": "15%",
			},
			{
				"name": "actions",
				"title": "Actions",
				"filterType": "actions",
				"width": "15%",
				"bSortable": false,
				"render": function(data) {
					return '<a href="' + tableElement.find("input[name='edit_url']").val() + '/' 
										+ data + '" class="btn btn-xs default btn-editable"><i class="fa fa-pencil"></i> Edit</a>';
				}
			},
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
			/*"activate": {
				"name": "Activate",
			},
			"deactivate": {
				"name": "Deactivate",
			},*/
			"delete": {
				"name": "Delete",
				"confirmation": "Do you really want to delete the selected users?",
			},
		});
	}
	//Handle Company Users End

	//Tags Table js start here
	StreamKarERP.HandleTags = function() {

		var grid = new Datatable();
		var tableElement = $("#datatable_manage_tags");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "name",
				"title": "Name",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "parent_id",
				"title": "Parent",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "created_at",
				"title": "Created at",
				"filterType": "date",
				"width": "15%",
			},
			{
				"name": "actions",
				"title": "Actions",
				"filterType": "actions",
				"width": "110px",
				"bSortable": false,
				"render": function(data) {
					return '<a href="' + tableElement.find("input[name='edit_url']").val() + '/' + data + '" class="btn btn-xs default btn-editable"><i class="fa fa-pencil"></i> Edit</a>';
				}
			},
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
			/*"activate": {
				"name": "Activate",
			},
			"deactivate": {
				"name": "Deactivate",
			},*/
			"delete": {
				"name": "Delete",
				"confirmation": "Do you really want to delete the selected users?",
			},
		});
	}
	//Tags Table js end here

	//Panding Talent Table js start here
	StreamKarERP.HandlePendingTalents = function() {

		var grid = new Datatable();
		var tableElement = $("#datatable_manage_PendingTalents");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "users.username",
				"title": "Talent Name",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "realname",
				"title": "Real Name",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "title",
				"title": "Title",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "address",
				"title": "Address",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "city",
				"title": "City",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "created_at",
				"title": "Created at",
				"filterType": "date",
				"width": "15%",
			},
			{
				"name": "actions",
				"title": "Actions",
				"filterType": "actions",
				"width": "110px",
				"bSortable": false,
				"render": function(data) {
					return '<a href="' + tableElement.find("input[name='edit_url']").val() + '/' + data + '" class="btn btn-xs default btn-editable"><i class="fa fa-pencil"></i> Edit</a>';
				}
			},
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
			/*"activate": {
				"name": "Activate",
			},*/
			"approve": {
				"name": "Approve",
				"confirmation": "Do you really want to promote to talent?",
			},
			"delete": {
				"name": "Delete",
				"confirmation": "Do you really want to delete the selected users?",
			},
		});
	}
	//Panding Talent Table js end here

	//Approved Talent Table js start here
	StreamKarERP.handleApprovedTalent = function() {

		var grid = new Datatable();
		var tableElement = $("#datatable_manage_approve_talent");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "realname",
				"title": "Real Name",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "title",
				"title": "Title",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "address",
				"title": "Address",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "city",
				"title": "City",
				"filterType": "text",
				"render": sanitizeData,
			},
			{
				"name": "created_at",
				"title": "Created at",
				"filterType": "date",
				"width": "15%",
			},
			{
				"name": "actions",
				"title": "Actions",
				"filterType": "actions",
				"width": "110px",
				"bSortable": false,
				"render": function(data) {
					return '<a href="' + tableElement.find("input[name='edit_url']").val() + '/' + data + '" class="btn btn-xs default btn-editable"><i class="fa fa-pencil"></i> Edit</a>';
				}
			},
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
			/*"activate": {
				"name": "Activate",
			},
			"deactivate": {
				"name": "Deactivate",
			},*/
			"delete": {
				"name": "Delete",
				"confirmation": "Do you really want to delete the selected users?",
			},
		});
	}
	//Approved Talent Table js end here



	//Agencies Request Goes Here
	StreamKarERP.HandleAgenciesApproved = function() {

		var grid = new Datatable();
		var tableElement = $("#datatable_manage_agencies_request");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "name",
				"title": "Name",	
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "director.username",
				"title": "Director",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "about",
				"title": "About",
				"filterType": "text",
				"search": true,
				"render": makeExcerpt(120),

			},
			{
				"name": "created_at",
				"title": "Created at",
				"filterType": "date",
				"width": "15%",
			},
			{
				"name": "actions",
				"title": "Actions",
				"filterType": "actions",
				"width": "110px",
				"bSortable": false,
				"render": function(data) {
					return '<a href="' + tableElement.find("input[name='edit_url']").val() + '/' + data + '" class="btn btn-xs default btn-editable"><i class="fa fa-pencil"></i> Edit</a>';
				}
			},
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
			/*"activate": {
				"name": "Activate",
			},
			"deactivate": {
				"name": "Deactivate",
			},*/
			"delete": {
				"name": "Delete",
				"confirmation": "Do you really want to delete the selected users?",
			},
		});
	}

	//Agencies Request End Here

	//Agencies Pending Goes Here
	StreamKarERP.HandleAgenciesPending = function() {

		var grid = new Datatable();
		var tableElement = $("#datatable_manage_agencies_pending");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "name",
				"title": "Name",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "request_by.username",
				"title": "Director",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "introduction",
				"title": "Introduction",
				"filterType": "text",
				"search": true,
				"render": makeExcerpt(120),
			},
			{
				"name": "actions",
				"title": "Actions",
				"filterType": "actions",
				"width": "110px",
				"bSortable": false,
				"render": function(data) {
					return '<a href="' + tableElement.find("input[name='edit_url']").val() + '/' + data + '" class="btn btn-xs default btn-editable"><i class="fa fa-pencil"></i> Edit</a>';
				}
			},
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
			/*"activate": {
				"name": "Activate",
			},*/
			"approve": {
				"name": "Approve",
			},
			"delete": {
				"name": "Delete",
				"confirmation": "Do you really want to delete the selected users?",
			},
		});
	}

	//Agencies Pending Request End Here

	//Agencies Pending Goes Here
	StreamKarERP.HandleAgencyMembers = function() {

		var grid = new Datatable();
		var tableElement = $("#datatable_manage_agency_members");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "members.username",
				"title": "Username",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "agency.name",
				"title": "Agency Name",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "actions",
				"title": "Actions",
				"filterType": "actions",
				"width": "110px",
				"bSortable": false,
				"render": function(data) {
					return '';
				}
			},
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
			/*"activate": {
				"name": "Activate",
			},*/
			"approve": {
				"name": "Approve",
			},
			"delete": {
				"name": "Delete",
				"confirmation": "Do you really want to delete the selected users?",
			},
		});
	}

	//Agencies Members Request End Here

	//Agencies Approved Goes Here
	StreamKarERP.HandleAgencyMembersApproved = function() {

		var grid = new Datatable();
		var tableElement = $("#datatable_manage_agency_approved_members");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "members.username",
				"title": "Username",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "agency.name",
				"title": "Agency Name",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "actions",
				"title": "Actions",
				"filterType": "actions",
				"width": "110px",
				"bSortable": false,
				"render": function(data) {
					return '';
				}
			},
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
			/*"activate": {
				"name": "Activate",
			},*/
		
			"delete": {
				"name": "Delete",
				"confirmation": "Do you really want to delete the selected users?",
			},
		});
	}

	//Agencies Members approved  End Here

	//Recommends Videos Goes Here
	StreamKarERP.HandleRecommended = function() {

		var grid = new Datatable();
		var tableElement = $("#datatable_recommended");

		var columns = [
			getCheckColumn(),
			{
				"name": "id",
				"title": "ID",
				"filterType": "text",
				"width": "40px",
			},
			{
				"name": "recommend_by.username",
				"title": "Username",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "order",
				"title": "Order",
				"filterType": "text",
				"search": true,
				"render": sanitizeData,
			},
			{
				"name": "actions",
				"title": "Actions",
				"filterType": "actions",
				"width": "110px",
				"bSortable": false,
				"render": function(data) {
					return '<a href="' + tableElement.find("input[name='edit_url']").val() + '/' + data + '" class="btn btn-xs default btn-editable"><i class="fa fa-pencil"></i> Edit</a>';
				}
			},
		];

		prepareDatatableFilters(tableElement, columns);

		grid.init({
			src: tableElement,
			onError: function (grid) { },
			loadingMessage: 'Loading...',
			dataTable: {
				"lengthMenu": [
					[15, 25, 50, 100, 150, -1],
					[15, 25, 50, 100, 150, "All"]
				],
				"pageLength": 15,
				"ajax": {
					"url": tableElement.find("input[name='ajax_url']").val() + "?_token=" + $("input[name='_token']").val(),
				},
				"order": [
					[1, "desc"]
				],
				"columns": columns,
				"autoWidth": true,
				//"stateSave": true,
			}
		});

		addDatatableRowSelector(tableElement);

		prepareDatatableActions(grid, grid.getTableWrapper().find(".table-group-actions"), {
			/*"activate": {
				"name": "Activate",
			},*/
		
			"delete": {
				"name": "Delete",
				"confirmation": "Do you really want to delete the selected users?",
			},
		});
	}

	// approved  End Here

	//Talent pendning request ends here

	StreamKarERP.Sidebar = (function(Sidebar) {

		Sidebar.init = function() {

			Sidebar.initVertical();
			Sidebar.initHorizontal();
		};

		Sidebar.initVertical = function() {

			var selectedItem = null;
			var selectedItemLink = null;
			var minProximity = 99999999999;

			$(".page-sidebar-menu li>a").each(function() {
				var $this = $(this);
				if(document.location.href.indexOf(this.href) === 0) {
					var proximity = document.location.href.replace(this.href, "").length;
					if(proximity < minProximity) {
						selectedItem = $this.parent();
						selectedItemLink = $this;
						minProximity = proximity;
					}
				}
			});

			if(selectedItem) {
				selectedItem.addClass("active");

				var totalParents = 0;
				selectedItem.parents("li").each(function() {
					var item = $(this);
					var link = item.find(">a:first");
					item.addClass("active");
					link.append('<span class="selected"> </span><span class="arrow open"></span>');
					totalParents++;
				});

				if(totalParents == 0) {
					selectedItemLink.append('<span class="selected"> </span>');
				}

			}
		};

		Sidebar.initHorizontal = function() {

			var selectedItem = null;
			var selectedItemLink = null;
			var minProximity = 99999999999;

			$(".hor-menu li>a").each(function() {
				var $this = $(this);
				if(document.location.href.indexOf(this.href) === 0) {
					var proximity = document.location.href.replace(this.href, "").length;
					if(proximity < minProximity) {
						selectedItem = $this.parent();
						selectedItemLink = $this;
						minProximity = proximity;
					}
				}
			});

			if(selectedItem) {
				selectedItem.addClass("active");
				selectedItemLink.append('<span class="selected"> </span>');
			}
		};

		return Sidebar;
	})(StreamKarERP.Sidebar || {});


	// PUBLIC FUNCTIONS

	StreamKarERP.tinyModal = function(title, body, buttons) {
		var modal = $(".modal");

		modal.find(".modal-title").text(title);
		modal.find(".modal-body").html(body);

		//modal.find(".submit").off("click").click(callback);
		var footer = modal.find(".modal-footer").empty();

		/*buttons.push({
			"text": "Close",
			"class": "default",
		})*/

		for(var i in buttons) {
			var obj = $('<button type="button" class="btn" data-dismiss="modal"></button>');
			obj.addClass(buttons[i].class);
			obj.text(buttons[i].text);
			if("callback" in buttons[i]) {
				obj.click(buttons[i].callback);
			}
			footer.append(obj);
		}

		modal.modal({ show: false}).modal("show");
	}

	StreamKarERP.pulsate = function(item) {
		var $this = item;
		$this.addClass("pulsate");
		setTimeout(function() {
			$this.removeClass("pulsate");
		}, 500);
	}

	StreamKarERP.getLabelClass = function(tag) {
		var classes = {

			"admin": "label-warning",
			"dbadmin": "label-danger",
			"csr": "label-info",
			"client": "label-success",

			"ceo": "label-warning bg-red-thunderbird",
			"cfo": "label-warning bg-red-thunderbird",
			"gm": "label-danger",
			"director": "label-warning",
			"pm": "label-primary",
			"tl": "label-success",

			"a": "label-primary",
			"i": "label-danger",

			"resolved": "label-success",
			"unresolved": "label-danger",

			"high": "label-primary",
			"medium": "label-info",
			"low": "label-default",

		}

		if(classes.hasOwnProperty(tag)) {
			return classes[tag];
		}
		return "label-info";
	}

	StreamKarERP.generateRandomID = function() {
		// DO NOT CHANGE.
		// This specific pattern is used to detect temporary IDs on server side.
		return "hash" + (new Date().getTime()) + "c" + (++controlAI) + "x";
	}

	StreamKarERP.attachValidator = function(form) {

		var errorBanner = $('.alert-danger', form);

		form.validate({
			errorElement: 'span', //default input error message container
			errorClass: 'help-block help-block-error', // default input error message class
			focusInvalid: false, // do not focus the last invalid input
			ignore: "",  // validate all fields including form hidden input
			rules: {
				// username: {
				// 	remote: {
				// 		type: 'post',
				// 		url: $("input[name='username_validation_url']").val() + "?_token=" + $("input[name='_token']").val(),
				// 		dataType: 'json'
				// 	}
				// },
				// email: {
				// 	remote: {
				// 		type: 'post',
				// 		url: $("input[name='email_validation_url']").val() + "?_token=" + $("input[name='_token']").val(),
				// 		dataType: 'json'
				// 	}
				// },
			},

			invalidHandler: function (event, validator) {
				errorBanner.show();
				// Metronic.scrollTo(errorBanner, -200);
			},

			errorPlacement: function (error, element) { // render error placement for each input type
				var icon = $(element).parent('.input-icon').children('i');
				icon.removeClass('fa-check').addClass("fa-warning");  
				icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});

				$(element).parents(".form-group:first").find(".help-block").text(error.text());
			},

			highlight: function (element) { // hightlight error inputs
				$(element)
					.closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
			},

			unhighlight: function (element) { // revert the change done by hightlight
				
			},

			success: function (label, element) {
				var icon = $(element).parent('.input-icon').children('i');
				$(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
				icon.removeClass("fa-warning").addClass("fa-check");
			},

			submitHandler: function (form) {
				errorBanner.hide();
				form.submit();
			}
		});

	}

	StreamKarERP.addTabAbility = function(object) {
		object.keydown(function(e) {
			if(e.keyCode === 9) { // tab was pressed
				// get caret position/selection
				var start = this.selectionStart;
				var end = this.selectionEnd;

				var $this = $(this);
				var value = $this.val();

				// set textarea value to: text before caret + tab + text after caret
				$this.val(value.substring(0, start)
							+ "\t"
							+ value.substring(end));

				// put caret at right position again (add one for the tab)
				this.selectionStart = this.selectionEnd = start + 1;

				// prevent the focus lose
				e.preventDefault();
			}
		});
	}

	StreamKarERP.generatePassword = function(object) {
		var form = $(object).parents(".form-body:first");

		var password = Math.random().toString(36).slice(-8);

		form.find("input[name='password']:visible").val(password).valid();
		var confirmation = form.find("input[name='password_confirmation']:visible")
			.val(password);
		confirmation.valid();

		var label = confirmation.parents(".form-group:first").find(".help-block");

		label.text("Your password is '" + password + "'");
	}

	StreamKarERP.toggleRow = function(object) {
		var $this = $(object);
		var row = $this.parents('tr:first');
		//var headerCheck = row.parents("table:first").find(".heading input[type='checkbox']");

		if($this.is(':checked')) {
			row.addClass("selected");
			//headerCheck.prop("checked", true);
		} else {
			row.removeClass("selected");
			//headerCheck.prop("checked", false);
		}
	}

	StreamKarERP.toggleAllRows = function(object) {
		var $this = $(object);
		var table = $this.parents('table:first');
		var allChecks = table.find("tbody .checker input");

		var checked = $this.prop("checked");

		allChecks.prop("checked", !checked);
		allChecks.click();

		return;

		var totalChecked = 1;
		allChecks.each(function() {
			totalChecked *= $(this).is(":checked");
		});

		var checked = totalChecked > 0 ? true : false;

		allChecks.prop("checked", checked);
		allChecks.click();

	}

	StreamKarERP.switchTab = function(obj) {
		var href = obj.getAttribute("href");
		var tab = $(".tabbable li>a[href='" + href + "']");
		tab.click();
	}

	StreamKarERP.addNotifications = function(notifications) {

		var list = $(".dropdown-notification .dropdown-menu-list");

		var iconMap = {
			"default": "fa-tree",
			"success": "fa-paper-plane",
			"danger": "fa-paw",
			"warning": "fa-bomb",
			"info": "fa-plus",
			"primary": "fa-ge",
		};

		var colorMap = {
			"default": "default",
			"success": "success",
			"danger": "danger",
			"warning": "warning",
			"info": "info",
			"primary": "primary",
		};

		var unreadNotifications = 0;
		for(var i in notifications) {
			var notification = notifications[i];

			var item = $('<li> <a href="javascript:;"> <span class="time">just now</span> <span class="details"> <span class="label label-sm label-icon"> <i class="fa fa-plus"></i> </span> <span class="notification-message">New user registered.</span> </span> </a> </li>');

			item.find(">a").attr("href", notification.link);
			item.find(".time").text(notification.ago);
			item.find(".notification-message").text(notification.message);
			item.find(".label").addClass("label-" + getMapValue(colorMap, notification.type, "primary"));
			item.find(".fa").addClass(getMapValue(iconMap, notification.type, "fa-gears"));

			if(!notification.read) {
				item.addClass("new-notification");
				unreadNotifications++;
			}

			list.append(item);
		}

		if(unreadNotifications > 1) {
			$(".dropdown-notification .dropdown-menu-list a").attr("target", "_blank");
		}

		if(unreadNotifications > 0) {

			var unreadStuff = true;
			$("#header_notification_bar").one("hover", function() {
				if(unreadStuff == false) {
					return;
				}
				unreadStuff = false;

				var url = $("input[name='notifications_read_url']").val() + "?_token=" + $("input[name='_token']").val();
				$.ajax({
					"url": url,
					"method": "post",
				});

			})

			$('.dropdown-notification .slimScrollDiv').bind('slimscroll', function(e, pos) {
				if(pos == "bottom") {
					// ...
				}
			});

		}

		$(".dropdown-notification .badge").addClass(unreadNotifications > 0 ? "badge-danger" : "badge-success").text(unreadNotifications);
		$(".dropdown-notification .notifications-count").text(unreadNotifications);

	}

	StreamKarERP.addRequiredHints = function(container) {
		container.find("input[required='required'], select[required='required'], textarea[required='required']").each(function() {
			var $this = $(this);
			var group = $this.parents('.form-group:first');
			var label = group.find(".control-label:first");
			if(label.find("[aria-required]").length == 0) {
				label.append('<span class="required" aria-required="true"> * </span>');
			}
		})
	}

	StreamKarERP.humanSerialize = function(form) {
		var data = {};
		form.find("input, select, textarea").each(function() {
			var $this = $(this);
			data[$this.attr("data-title")] = $this.val();
		});
		return data;
	}

	StreamKarERP.preventEnterSubmit = function() {
		$("form").keypress(function(e) {
			e = e || event;
			var txtArea = /textarea/i.test((e.target || e.srcElement).tagName);
			var button = /button/i.test((e.target || e.srcElement).tagName);
			return txtArea || button || (e.keyCode || e.which || e.charCode || 0) !== 13;
		});
	}

	StreamKarERP.generateLaravelValidation = function() {

		var validationMap = {
			"unique": "unique:{value}",
			"required": "required",
			"type:email": "email",
			//"type:password": "password",
			//"name:password_confirmation": "confirmed",
			"same": "same:{value}",
			"minlength": "min:{value}",
			"maxlength": "max:{value}",
			"pattern": "regex:/{value}/",
			"in": 'in:" . implode(",", array_keys({value})) . "',
		}

		var forms = $(".form-validate-auto");

		forms.each(function() {
			var form = $(this);
			console.log(form[0].action);

			var validation = {};
			form.find("input, select, textarea").each(function() {
				var $this = $(this);

				var attributesArray = [];

				for(var i in validationMap) {

					var key = "";
					var value = "";
					if(i.indexOf(":")) {
						var params = i.split(":");
						key = params[0];
						value = params[1];
					} else {
						key = i;
					}

					var attribute = $this.attr(key);

					if(attribute) {
						if(value && attribute != value) {
							// if value is defined, attribute must match it.
							continue;
						} else {
							// logic!

							// replace the {value}
							var replacement = validationMap[i];
							replacement = replacement.replace("{value}", attribute);

							// replace the {regex}
							replacement = replacement.replace("{regex}", attribute.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g, "\\$&"));

							// add to attributes
							attributesArray.push(replacement);

						}
					}

					if(attributesArray.length > 0) {
						var validationString = attributesArray.join("|");
						var name = $this.attr("name");
						if(name) {
							validation[name] = validationString;
						}
					}
				}
			});

			// format
			/*$validator = \Validator::make(\Input::get(),
				[
					'password' => 'required',
					'email' => 'required|email'
				]
			);*/

			var validationBlock = "$validator = \\Validator::make(\\Input::get(),\n";
			validationBlock += "\t[\n";

			for(var i in validation) {
				validationBlock += '\t\t' + "'" + i + "' => " + '"' + validation[i] + '",' + '\n';
			}

			validationBlock += "\t]\n";
			validationBlock += ");\n";

			console.log(validationBlock);

		})
	}

	StreamKarERP.initUserSelect = function(selectBox) {
		selectBox.select2({
			placeholder: "Search for a user",
			minimumInputLength: 2,
			multiple: selectBox.attr("multiple"),
			ajax: {
				url: selectBox.attr("remote-url"),
				dataType: 'json',
				type: 'post',
				quietMillis: 250,
				data: function (term, page) {
					return {
						q: term,
						_token: $("input[name='_token']").val(),
					};
				},
				results: function (data, page) {
					return { results: data };
				},
				cache: true
			},
			initSelection: function(element, callback) {
				var selectBox = $(element);
				var data = selectBox.val();
				var url = selectBox.attr("remote-url");
				if (data !== "") {
					$.ajax(url, {
						dataType: "json",
						method: 'post',
						data: {
							"q" : data,
							_token: $("input[name='_token']").val(),
						}
					}).done(function(data) {
						if(selectBox.attr("multiple")) {
							callback(data);
						} else {
							callback(data[0]);
						}
					});
				}
			},
			formatResult: function(item) {
				var markup = 
					'<div class="user-row">' +
						'<div class="user-row-icon"><img src="' + escapeHTML(item.photoSmall) + '" /></div>' +
						'<div class="user-row-info">' +
							'<div class="user-row-name">' + escapeHTML(item.name) + '</div>' +
							'<div class="user-row-date">' + (item.dateJoinAgo ? escapeHTML('Joined ' + item.dateJoinAgo) : '') + '</div>' +
						'</div>' +
						'<div class="user-row-type"><span class="label label-sm ' + StreamKarERP.getLabelClass(item.type) + '">' + item.typeText + '</span></div>' +
						'<div class="clearfix"></div>' +
					'</div>';

				return markup;
			},
			formatSelection: function(item) {
				return item.name;
			},
			dropdownCssClass: "bigdrop",
			escapeMarkup: function (m) { return m; }
		});
	}

	StreamKarERP.initCampaignSelect = function(selectBox) {
		selectBox.select2({
			placeholder: "Search for campaigns",
			minimumInputLength: 2,
			multiple: selectBox.attr("multiple"),
			ajax: {
				url: selectBox.attr("remote-url"),
				dataType: 'json',
				type: 'post',
				quietMillis: 250,
				data: function (term, page) {
					return {
						q: term,
						_token: $("input[name='_token']").val(),
					};
				},
				results: function (data, page) {
					return { results: data };
				},
				cache: true
			},
			initSelection: function(element, callback) {
				var selectBox = $(element);
				var data = selectBox.val();
				var url = selectBox.attr("remote-url");
				if (data !== "") {
					$.ajax(url, {
						dataType: "json",
						method: 'post',
						data: {
							"q" : data,
							_token: $("input[name='_token']").val(),
						}
					}).done(callback);
				}
			},
			formatResult: function(item) {
				var markup = escapeHTML(item.name);
				return markup;
			},
			formatSelection: function(item) {
				return item.name;
			},
			dropdownCssClass: "bigdrop",
			escapeMarkup: function (m) { return m; }
		});
	}

	StreamKarERP.initInlineCampaignSelect = function(selectBox) {
		
		var selectBox = $('.inline-campaign-select');
		selectBox.each(function() {
			$this = $(this);
			var list = JSON.parse($this.attr("data-list"));
			var optgroups = [];

			for(var i in list) {
				var children = [];
				for(var j in list[i]) {
					children.push({
						"value": j,
						"text": list[i][j],
					});
				}
				optgroups.push({
					"text": i,
					"children": children,
				})
			}

			$this.editable({
				inputclass: 'form-control input-medium',
				source: optgroups,
			}).on('save', function(e, params) {
				var form = $(e.target);
				var hidden = form.find("input[name='productType']");
				hidden.val(params.newValue);
				form.get(0).submit();
			});;

		})
	}

	StreamKarERP.showActionsDiff = function() {
		var before = JSON.parse($("input[name='before']").val());
		var after = JSON.parse($("input[name='after']").val());

		delete before.updated_at;
		delete after.updated_at;

		var delta = jsondiffpatch.diff(before, after);

		var visualHTML = jsondiffpatch.formatters.html.format(delta, before);
		$(".diff-total").html(visualHTML);

		var visualHTML = jsondiffpatch.formatters.html.format({}, before);
		$(".diff-before").html(visualHTML);

		var visualHTML = jsondiffpatch.formatters.html.format({}, after);
		$(".diff-after").html(visualHTML);

		$(".all-diff .jsondiffpatch-left-value")
			.attr("data-original-title", "Old value");

		$(".all-diff .jsondiffpatch-right-value")
			.attr("data-original-title", "New value");

		$(".all-diff *[data-original-title]").tooltip({
			delay: {
				"show": 500,
				"hide": 100
			}
		});
	}

	StreamKarERP.checkScrollableWidth = function() {
		var table = $(".table-scrollable-auto");
		table.hide();
		var width = table.parent().innerWidth();
		table.width(width);
		table.show();
	}

	StreamKarERP.focusCaller = function() {
		var form = $('.caller-form');
		StreamKarERP.pulsate(form);
		form.find("input[name='id']").focus().click();
	}

	var stopwords = ["a", "about", "above", "above", "across", "after",
		"afterwards", "again", "against", "all", "almost", "alone", "along",
		"already", "also","although","always","am","among", "amongst",
		"amoungst", "amount",  "an", "and", "another", "any","anyhow","anyone",
		"anything","anyway", "anywhere", "are", "around", "as",  "at", "back",
		"be","became", "because","become","becomes", "becoming", "been",
		"before", "beforehand", "behind", "being", "below", "beside",
		"besides", "between", "beyond", "bill", "both", "bottom","but",
		"by", "call", "can", "cannot", "cant", "co", "con", "could",
		"couldnt", "cry", "de", "describe", "detail",  "do", "does", "done",  "down",
		"due", "during", "each", "eg", "eight", "either", "eleven","else",
		"elsewhere", "empty", "enough", "etc", "even", "ever", "every",
		"everyone", "everything", "everywhere", "except", "few", "fifteen",
		"fify", "fill", "find", "fire", "first", "five", "for", "former",
		"formerly", "forty", "found", "four", "from", "front", "full",
		"further", "get", "give", "go", "had", "has", "hasnt", "have",
		"he", "hence", "her", "here", "hereafter", "hereby", "herein",
		"hereupon", "hers", "herself", "him", "himself", "his", "how",
		"however", "hundred", "ie", "if", "in", "inc", "indeed",
		"interest", "into", "is",  "it", "its", "itself", "keep",
		"last", "latter", "latterly", "least", "less", "ltd", "made",
		"many", "may", "me", "meanwhile", "might", "mill", "mine",
		"more", "moreover", "most", "mostly", "move", "much", "must", "my",
		"myself", "neither", "never", "nevertheless", "next",
		"nine", "no", "nobody", "none", "noone", "nor", "not", "nothing", "now",
		"nowhere", "of", "off", "often", "on", "once", "one", "only", "onto",
		"or", "other", "others", "otherwise", "our", "ours", "ourselves", "out",
		"over", "own","part", "per", "perhaps", "please", "put", "rather", "re",
		"same", "see", "seem", "seemed", "seeming", "seems", "serious", "several",
		"she", "should", "show", "side", "since", "sincere", "six", "sixty", "so",
		"some", "somehow", "someone", "something", "sometime", "sometimes", "somewhere",
		"still", "such", "system", "take", "ten", "than", "that", "the", "their", "them",
		"themselves", "then", "thence", "there", "thereafter", "thereby", "therefore",
		"therein", "thereupon", "these", "they", "thickv", "thin", "third", "this",
		"those", "though", "three", "through", "throughout", "thru", "thus", "to",
		"together", "too", "top", "toward", "towards", "twelve", "twenty", "two",
		"un", "under", "until", "up", "upon", "us", "very", "via", "was", "way", "we",
		"well", "were", "what", "whatever", "when", "whence", "whenever", "where",
		"whereafter", "whereas", "whereby", "wherein", "whereupon", "wherever",
		"whether", "which", "while", "whither", "who", "whoever", "whole", "whom",
		"whose", "why", "will", "with", "within", "without", "would", "yet", "you",
		"your", "yours", "yourself", "yourselves", "the",
		// contractions?
		"didnt", "doesnt", "dont", "isnt", "wasnt", "youre", "hes", "ive", "theyll",
		"whos", "wheres", "whens", "whys", "hows", "whats", "were", "shes", "im", "thats"
	];

	var hashCache = {};
	StreamKarERP.stringToHash = function(value) {
		if(value == null) {
			return {};
		}
		if(value in hashCache) {
			return hashCache[value];
		}

		value = value
			.replace(/[^a-zA-Z0-9]/g, ' ')
			.replace(/ +/g,' ')
			.replace(/\n+/g, "\n");
		value = $.trim(value);

		value = value.toLowerCase();
		var array = value.split(" ");
		var obj = {};
		for(var i = 0; i < array.length; i++) {
			var word = array[i];
			if(stopwords.indexOf(word) == -1) {
				obj[word] = "";
			}
		}
		hashCache[value] = obj;
		return obj;
	}

	StreamKarERP.easyMatch = function(val1, val2) {
		var obj1 = StreamKarERP.stringToHash(val1);
		var obj2 = StreamKarERP.stringToHash(val2);

		for(var i in obj1) {
			if(i in obj2) {

			} else {
				return false;
			}
		}

		return true;
	}

	// READY TIME STUFF

	// init datepicker
	var pickers = $('.date-picker');
	if(pickers.length > 0) {
		pickers.each(function() {
			var picker = $(this);
			var hilights = picker.attr("data-hilights");
			var hilightedDates = [];
			if(hilights) {
				hilights = hilights.split(",");
				for(var i in hilights) {
					hilightedDates.push( new Date( Date.parse(hilights[i]) + Date.parse("01/01/1970 00:00:00") ) );
				}
			}

			picker.datepicker({
				rtl: Metronic.isRTL(),
				autoclose: true,
				todayHighlight: true,
				todayBtn: true,
				daysOfWeekHighlighted: [2,4],
				hilightedDates: hilightedDates,
				nextDate: picker.attr("data-next") != '' ? new Date( Date.parse( picker.attr("data-next")) ) : null,
				pickerPosition: (Metronic.isRTL() ? "bottom-right" : "bottom-left"),
				minViewMode: picker.attr("data-minViewMode"),
				startViewMode: picker.attr("data-startViewMode"),
				beforeShowDay: function(date) {

					for(var i in this.hilightedDates) {
						if( this.hilightedDates[i].getTime() == date.getTime() ) {
							return {classes: 'highlight', 'title': 'Historical entry'};
						}
					}

				},
			});

		});
	}

	var pickers = $('.date-picker-parent');
	if(pickers.length > 0) {
		pickers.click(function() {
			var picker = $(this).find(".date-picker");
			picker.datepicker('show');
		});
		pickers.find(".date-picker").on('changeDate', function() {
			var box = $(this);
			box.parent().find(".date-picker-text").text(box.val());
		});
		pickers.find(".date-picker").each(function() {
			var picker = $(this).parent().find(".date-picker")
			var date = new Date(picker.get(0).getAttribute('value').replace(/\-/g,"/"));
			picker.datepicker('setDate', date);
		});
	}

	// init datetimepicker
	var pickers = $('.datetime-picker');
	if(pickers.length > 0) {
		pickers.datetimepicker({
			rtl: Metronic.isRTL(),
			autoclose: true,
			todayHighlight: true,
			todayBtn: true,
			pickerPosition: (Metronic.isRTL() ? "bottom-left" : "bottom-right"),
			minuteStep: 15,
		});
	}

	// autovalidate forms
	$(".form-validate-auto").each(function() {
		StreamKarERP.attachValidator($(this));
	})

	// add asterik to required fields
	StreamKarERP.addRequiredHints($("body:first"));

	// add asterik to required fields
	$(".heading input[type='checkbox']").each(function() {
		this.checked = false;
	})

	// make labels out of static fields
	$(".form-control-label[data-value][data-text]").each(function() {
		var $this = $(this);
		$this.append(makeLabelHTML($this.attr("data-value"), $this.attr("data-text") ));
	});

	// auto nestable
	var nestables = $('*[data-nestable-auto]');
	if(nestables.length > 0) {
		nestables.nestable({
			group: "toolbox",
			maxDepth: 0,
			dropCallback: function(details) {
				return true;
			},
			moveCallback: function(details) {
				return true;
			}
		});
	}

	// auto spinner
	var spinners = $('*[data-spinner-auto]');
	if(spinners.length > 0) {
		spinners.spinner({
			"min": 0,
		});
	}

	// auto select2
	$("*[data-select2-auto]").each(function() {
		var $this = $(this);
		$this.select2();
	});

	// auto tooltips
	var divs = $('*[data-original-title]');
	if(divs.length > 0) {
		divs.tooltip({
			delay: {
				"show": 200,
				"hide": 100
			}
		});
	}

	// auto submit
	$('*[data-submit-auto]').on('change switchChange.bootstrapSwitch', function(e) {
		var form = $(this).parents("form:first");
		if(form.is("[data-simulate-ajax]")) {
			simulateAjax.call(form.get(0), new Event('1'));
		} else {
			form.submit();
		}
	});

	// auto submit selective
	$('*[data-submit-auto-selective]').each(function(e) {
		var input = $(this);
		input.on(input.attr('data-submit-auto-selective'), function() {
			var form = $(this).parents("form:first");
			if(form.is("[data-simulate-ajax]")) {
				simulateAjax.call(form.get(0), new Event('1'));
			} else {
				form.submit();
			}
		});
	});

	// auto check
	$('*[data-check-auto]').each(function() {
		var $this = $(this);
		if($this.attr("data-checked") != null) {
			$this.prop('checked', true);
		}
	});

	// query selectors
	$("*[data-user-select]").each(function() {
		var $this = $(this);
		StreamKarERP.initUserSelect($this);
	});

	$("*[data-campaign-select]").each(function() {
		var $this = $(this);
		StreamKarERP.initCampaignSelect($this);
	});

	// view/hide stuff based on account type
	$(".account-type-select").click(function() {
		var $this = $(this);
		var value = $this.val();

		$("*[data-account-type]").each(function() {
			var $item = $(this);
			var type = $item.attr('data-account-type');

			if(type.indexOf("!") === 0) {
				type = type.replace(/^\!/, "");
				// not
				if(type != value) {
					$item.show();
				} else {
					$item.hide();
					//$item.val('');
				}
			} else {
				if(type == value) {
					$item.show();
				} else {
					$item.hide();
					//$item.val('');
				}
			}

		});

	}).click();

	// simulate ajax
	//$("form[data-simulate-ajax]").submit(simulateAjax);

	return StreamKarERP;
})(StreamKarERP || {});
