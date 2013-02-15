(function( $ ) {
        $.widget( "ui.combobox", {
            _create: function() {
                var input,
                    that = this,
                    select = this.element.hide(),
                    selected = select.children( ":selected" ),
                    value = selected.val() ? selected.text() : "",
                    wrapper = this.wrapper = $( "<span>" )
                        .addClass( "ui-combobox" )
                        .insertAfter( select );
 
                function removeIfInvalid(element) {
                    var value = $( element ).val(),
                        matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( value ) + "$", "i" ),
                        valid = false;
                    select.children( "option" ).each(function() {
                        if ( $( this ).text().match( matcher ) ) {
                            this.selected = valid = true;
                            return false;
                        }
                    });
                    if ( !valid ) {
                        // remove invalid value, as it didn't match anything
                        $( element )
                            .val( "" )
                            .attr( "title", value + " didn't match any item" )
                            .tooltip( "open" );
                        select.val( "" );
                        setTimeout(function() {
                            input.tooltip( "close" ).attr( "title", "" );
                        }, 2500 );
                        input.data( "autocomplete" ).term = "";
                        return false;
                    }
                }
 
                input = $( "<input>" )
                    .appendTo( wrapper )
                    .val( value )
                    .attr( "title", "" )
                    .addClass( "ui-state-default ui-combobox-input" )
                    .autocomplete({
                        delay: 0,
                        minLength: 0,
                        source: function( request, response ) {
                            var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
                            response( select.children( "option" ).map(function() {
                                var text = $( this ).text();
                                if ( this.value && ( !request.term || matcher.test(text) ) )
                                    return {
                                        label: text.replace(
                                            new RegExp(
                                                "(?![^&;]+;)(?!<[^<>]*)(" +
                                                $.ui.autocomplete.escapeRegex(request.term) +
                                                ")(?![^<>]*>)(?![^&;]+;)", "gi"
                                            ), "<strong>$1</strong>" ),
                                        value: text,
                                        option: this
                                    };
                            }) );
                        },
                        select: function( event, ui ) {
                            ui.item.option.selected = true;
                            that._trigger( "selected", event, {
                                item: ui.item.option
                            });
							 var ddlId = ui.item.option.parentNode.id;
							 //if (ddlId == "ddlCategory") {
							 //$("#ddlCategory").change();
							 //}
							 if (ddlId == "doctor") {
									 $("#doctor").change();
							}else if (ddlId == "city") {
									 $("#city").change();
							}else if (ddlId == "area") {
									 $("#area").change();
							}else if (ddlId == "therapy") {
									 $("#therapy").change();
							}else if (ddlId == "date_time") {
									 $("#date_time").change();
							}else if (ddlId == "therapy1") {
									 $("#therapy1").change();
							}else if (ddlId == "date_time1") {
									 $("#date_time1").change();
							}else if (ddlId == "h_therapy") {
									 $("#h_therapy").change();
							}else if (ddlId == "h_date_time") {
									 $("#h_date_time").change();
							}else if (ddlId == "h_therapy1") {
									 $("#h_therapy1").change();
							}else if (ddlId == "h_date_time1") {
									 $("#h_date_time1").change();
							}else if (ddlId == "location103") {
									 $("#location103").change();
							}else if (ddlId == "location104") {
									 $("#location104").change();
							}else if (ddlId == "location") {
									 $("#location").change();
							}else if (ddlId == "location1") {
									 $("#location1").change();
							}else if (ddlId == "h_location") {
									 $("#h_location").change();
							}else if (ddlId == "h_location1") {
									 $("#h_location1").change();
							}else if (ddlId == "doctor_name") {
									 $("#doctor_name").change();
							}else if (ddlId == "doctor_name1") {
									 $("#doctor_name1").change();
							}else if (ddlId == "h_doctor_name1") {
									 $("#h_doctor_name1").change();
							}else if (ddlId == "h_doctor_name") {
									 $("#h_doctor_name").change();
							}else if (ddlId == "date_time") {
									 $("#date_time").change();
							}else if (ddlId == "date_time1") {
									 $("#date_time1").change();
							}else if (ddlId == "h_date_time") {
									 $("#h_date_time").change();
							}else if (ddlId == "h_date_time1") {
									 $("#h_date_time1").change();
							}



							
                        },
                        change: function( event, ui ) {
                            if ( !ui.item )
                                return removeIfInvalid( this );
                        }
                    })
                    .addClass( "ui-widget ui-widget-content ui-corner-left" );
 
                input.data( "autocomplete" )._renderItem = function( ul, item ) {
                    return $( "<li>" )
                        .data( "item.autocomplete", item )
                        .append( "<a>" + item.label + "</a>" )
                        .appendTo( ul );
                };
 
                $( "<a>" )
                    .attr( "tabIndex", -1 )
                    .attr( "title", "Show All Items" )
                    .tooltip()
                    .appendTo( wrapper )
                    .button({
                        icons: {
                            primary: "ui-icon-triangle-1-s"
                        },
                        text: false
                    })
                    .removeClass( "ui-corner-all" )
                    .addClass( "ui-corner-right ui-combobox-toggle" )
                    .click(function() {
                        // close if already visible
                        if ( input.autocomplete( "widget" ).is( ":visible" ) ) {
                            input.autocomplete( "close" );
                            removeIfInvalid( input );
                            return;
                        }
 
                        // work around a bug (likely same cause as #5265)
                        $( this ).blur();
 
                        // pass empty string as value to search for, displaying all results
                        input.autocomplete( "search", "" );
                        input.focus();
                    });
 
                    input
                        .tooltip({
                            position: {
                                of: this.button
                            },
                            tooltipClass: "ui-state-highlight"
                        });
            },
 
            destroy: function() {
                this.wrapper.remove();
                this.element.show();
                $.Widget.prototype.destroy.call( this );
            }
        });
    })( jQuery );
 
    $(function() {
        $( "select" ).combobox();
    });