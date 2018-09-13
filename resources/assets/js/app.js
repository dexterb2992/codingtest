
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/*Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});
*/

$(function (codingTest){
	codingTest(window.jQuery, window, document);
}(function ($, window, document) {
	$(function () {
		require("jquery-ui/ui/widgets/autocomplete");

		init();

		let tbSearch = $("#search"),
			txtSearch = $("#search_val"),
			formSearch = $("#form_search"),
			btnSearch = $("#btn_search");

		tbSearch.autocomplete({
		    source: function(request, response) {
		        $.ajax({
		            url: "/api/airports",
		            type: 'get',
		            data: {
		            	q: request.term
		            },
		            dataType: "json",
		            success: function(data) {
		            	console.log(data);
		                response(data);
		            }
		        });
		    },
		    minLength: 3,
		    select: function(event, ui) {
		    	event.preventDefault();
		        console.log(ui.item ?
		            "Selected: " + ui.item.label :
		            "Nothing selected, input was " + this.value);

		        if (ui.item) {
		        	$("#search").val(ui.item.label);
		        	$("#search_val").val(ui.item.value);
		        }

		    },
		    open: function() {
		        $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
		    },
		    close: function() {
		        $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
		    }
		});

		formSearch.on("submit", function (e) {
			let $this = $(this);
			e.preventDefault();
			if ($.trim(tbSearch.val()) != '') {
				this.submit();
			}
		});

		btnSearch.click(function () {
			formSearch.submit();
		});
	});

	function init() {
		$('[data-toggle="tooltip"]').tooltip({
			placement: 'bottom'
		});
	}

}));