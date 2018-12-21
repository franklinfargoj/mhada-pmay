function get_checked_value() {
    return $('input[name=is_verified]:checked').val();
}

function lat_long_val() {
    return $('input[name=change_in_lat_long]:checked').val();
}

var FormControls = function () {
	var e = function () {
			$("#wetland_form").validate({
				rules: {
					name_of_wetland: {
						required: function(element) {
                        	return (get_checked_value() == '1');
                   		 }
					},
					name_of_tehsil: {
						required: function(element) {
                        	return (get_checked_value() == '1');
                   		 }
					},
					village_of_wetland: {
						required: true,
					},
					village_name_other: {
						required: true,
					},
					name_of_district: {
						required: function(element) {
                        	return (get_checked_value() == '1');
                   		 }
					},
					state: {
						required: function(element) {
                        	return (get_checked_value() == '1');
                   		 }
					},
					lattitude_of_wetland: {
						required: function(element) {
                        	return (get_checked_value() == '1');
                   		 }
					},
					longitude_of_wetland: {
						required: function(element) {
                        	return (get_checked_value() == '1');
                   		 }
					},
					protected_area: {
						required: function(element) {
                        	return (get_checked_value() == '1');
                   		 }
					},
					state_government_adminis: {
						required: function(element) {
                        	return (get_checked_value() == '1');
                   		 }
					},
					area_of_wetland: {
						required: function(element) {
                        	return (get_checked_value() == '1');
                   		 }
					},
					average_depth: {
						required: function(element) {
                        	return (get_checked_value() == '1');
                   		 }
					},
					maximum_depth: {
						required: function(element) {
                        	return (get_checked_value() == '1');
                   		 }
					},
					highest_recorded_depth: {
						required: function(element) {
                        	return (get_checked_value() == '1');
                   		 }
					},
					elevation: {
						required: function(element) {
                        	return (get_checked_value() == '1');
                   		 }
					},
					source_others_name: {
						required: '#source_others:checked',
					},
					source_river_canal_name: {
						required: '#source_river_canal:checked',
					},
					annual_rainfal_snowfal: {
						required: function(element) {
                        	return (get_checked_value() == '1');
                   		 }
					},
					temperature_minimum: {
						required: function(element) {
                        	return (get_checked_value() == '1');
                   		 }
					},
					temperature_maximum: {
						required: function(element) {
                        	return (get_checked_value() == '1');
                   		 }
					},
					humidity_minimum: {
						required: function(element) {
                        	return (get_checked_value() == '1');
                   		 }
					},
					humidity_maximum: {
						required: function(element) {
                        	return (get_checked_value() == '1');
                   		 }
					},
					zone_of_influence: {
						required: function(element) {
                        	return (get_checked_value() == '1');
                   		 }
					},
					land_use_forests: {
						required: function(element) {
                        	return (get_checked_value() == '1');
                   		 }
					},
					land_use_grassland: {
						required: function(element) {
                        	return (get_checked_value() == '1');
                   		 }
					},
					land_use_settlements_rural: {
						required: function(element) {
                        	return (get_checked_value() == '1');
                   		 }
					},
					land_use_settlements_urban: {
						required: function(element) {
                        	return (get_checked_value() == '1');
                   		 }
					},
					land_use_industrial: {
						required: function(element) {
                        	return (get_checked_value() == '1');
                   		 }
					},
					availabe_scientific_act: {
						required: function(element) {
                        	return (get_checked_value() == '1');
                   		 }
					},
					"ownership_details[0][survey_number]": {
						required: true
					},
					"ownership_details[0][area]": {
						required: true
					},
					"ownership_details[0][name_of_owner]": {
						required: true
					},
				},
				invalidHandler: function (e, r) {
					var i = $("#m_form_2_msg");
					i.removeClass("m--hide").show(), mApp.scrollTo(i, -200)
				},
				submitHandler: function (e) {
					$('#wetland_submit').addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0);
                	e.submit();
				}
			})
		},
		r = function () {
			$("#update_profile").validate({
				rules: {
					email: {
						required: !0,
						email: !0
					},
					name: {
						required: !0
					},
					mobilenumber: {
						required: !0,
						minlength: 10,
						maxlength: 10,
						number: true,
					},
				},
				invalidHandler: function (e, r) {
					alert('hello');
					var i = $("#m_form_2_msg");
					i.removeClass("m--hide").show(), mApp.scrollTo(i, -200)
				},
				submitHandler: function (e) {
					$('#submit_update_profile').addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0);
                	e.submit();
				}
			})
		},
		au = function () {
			$("#add_dep_user").validate({
				rules: {
					name: {
						required: !0,
					},
					email: {
						required: !0,
						email: !0,
					},
					mobilenumber: {
						required: !0,
						minlength: 10,
						maxlength: 10,
					},
				},
				invalidHandler: function (e, r) {
					var i = $("#m_form_2_msg");
					i.removeClass("m--hide").show(), mApp.scrollTo(i, -200)
				},
				submitHandler: function (e) {
					$('#submit_add_users').addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0);
                	e.submit();
				}
			})
		},
		cp = function () {
			$("#change_password").validate({
				rules: {
					current_password: {
						required: !0,
					},
					new_password: {
						required: !0,
						minlength: 6,
					},
					confirm_password: {
						required: !0,
						equalTo : "#new_password"
					},
				},
				invalidHandler: function (e, r) {
					var i = $("#m_form_2_msg");
					i.removeClass("m--hide").show(), mApp.scrollTo(i, -200)
				},
				submitHandler: function (e) {
					$('#submit_change_password').addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0);
                	e.submit();
				}
			})
		};
	return {
		init: function () {
			e(), r() , cp() , au()
		}
	}
}();
jQuery(document).ready(function () {
	FormControls.init()
});