$(document).ready( function() {

	// preview gambar
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    // if( input.length ) {
		    //     input.val(log);
		    // } else {
		    //     if( log ) alert(log);
		    // }

		});
		
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
		        
		        reader.onload = function (e) {
					$('#img-upload').attr('src', e.target.result);
					$('#errorGambar').addClass('hide');
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		
		$("#gambar").change(function(){
			readURL(this);
		}); 	

		// akhir preview gambar


		//datepicker
		$('#tanggal').datepicker({
			showAnim: 'slideDown',
			dateFormat: 'dd MM yy',
			changeMonth: true,
			changeYear: true,
			regional: 'id',
		});

		// combobox
		// $(function() {
        //     $.widget("custom.combobox", {
        //         _create: function() {
        //             this.wrapper = $("<span>")
        //                 .addClass("custom-combobox")
        //                 .insertAfter(this.element);

        //             this.element.hide();
        //             this._createAutocomplete();
        //             this._createShowAllButton();
        //         },

        //         _createAutocomplete: function() {
        //             var selected = this.element.children(":selected"),
        //                 value = selected.val() ? selected.text() : "";

        //             this.input = $("<input>")
        //                 .appendTo(this.wrapper)
        //                 .val(value)
        //                 .attr("title", "")
        //                 .addClass("custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left")
        //                 .autocomplete({
        //                     delay: 0,
        //                     minLength: 0,
        //                     source: this._source.bind(this)
        //                 })
        //                 .tooltip({
        //                     classes: {
        //                         "ui-tooltip": "ui-state-highlight"
        //                     }
        //                 });

        //             this._on(this.input, {
        //                 autocompleteselect: function(event, ui) {
        //                     ui.item.option.selected = true;
        //                     this._trigger("select", event, {
        //                         item: ui.item.option
        //                     });
        //                 },

        //                 autocompletechange: "_removeIfInvalid"
        //             });
        //         },

        //         _createShowAllButton: function() {
        //             var input = this.input,
        //                 wasOpen = false;

        //             $("<a>")
        //                 .attr("tabIndex", -1)
        //                 .attr("title", "Show All Items")
        //                 .tooltip()
        //                 .appendTo(this.wrapper)
        //                 .button({
        //                     icon: "ui-icon-triangle-1-s",
        //                     showLabel: false
        //                 })
        //                 .removeClass("ui-corner-all")
        //                 .addClass("custom-combobox-toggle ui-corner-right")
        //                 .on("mousedown", function() {
        //                     wasOpen = input.autocomplete("widget").is(":visible");
        //                 })
        //                 .on("click", function() {
        //                     input.trigger("focus");

        //                     // Close if already visible
        //                     if (wasOpen) {
        //                         return;
        //                     }

        //                     // Pass empty string as value to search for, displaying all results
        //                     input.autocomplete("search", "");
        //                 });
        //         },

        //         _source: function(request, response) {
        //             var matcher = new RegExp($.ui.autocomplete.escapeRegex(request.term), "i");
        //             response(this.element.children("option").map(function() {
        //                 var text = $(this).text();
        //                 if (this.value && (!request.term || matcher.test(text)))
        //                     return {
        //                         label: text,
        //                         value: text,
        //                         option: this
        //                     };
        //             }));
        //         },

        //         _removeIfInvalid: function(event, ui) {

        //             // Selected an item, nothing to do
        //             if (ui.item) {
        //                 return;
        //             }

        //             // Search for a match (case-insensitive)
        //             var value = this.input.val(),
        //                 valueLowerCase = value.toLowerCase(),
        //                 valid = false;
        //             this.element.children("option").each(function() {
        //                 if ($(this).text().toLowerCase() === valueLowerCase) {
        //                     this.selected = valid = true;
        //                     return false;
        //                 }
        //             });

        //             // Found a match, nothing to do
        //             if (valid) {
        //                 return;
        //             }

        //             // Remove invalid value
        //             this.input
        //                 .val("")
        //                 .attr("title", value + " didn't match any item")
        //                 .tooltip("open");
        //             this.element.val("");
        //             this._delay(function() {
        //                 this.input.tooltip("close").attr("title", "");
        //             }, 2500);
        //             this.input.autocomplete("instance").term = "";
        //         },

        //         _destroy: function() {
        //             this.wrapper.remove();
        //             this.element.show();
        //         }
        //     });

        //     $("#combobox").combobox();
        //     $("#toggle").on("click", function() {
        //         $("#combobox").toggle();
        //     });
        // });
			

	});