function get_bill_details_required() {
    return $('input[name=bill_raised]').val();
}

var SnippetLogin = function() {
    var e = $("#m_login"),
        i = function(e, i, a) {
            var t = $('<div class="m-alert m-alert--outline alert alert-' + i + ' alert-dismissible" role="alert">\t\t\t<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>\t\t\t<span></span>\t\t</div>');
            e.find(".alert").remove(), t.prependTo(e), t.animateClass("fadeIn animated"), t.find("span").html(a)
        },
        a = function() {
            e.removeClass("m-login--forget-password"), e.removeClass("m-login--signin"), e.addClass("m-login--signup"), e.find(".m-login__signup").animateClass("flipInX animated")
        },
        t = function() {
            e.removeClass("m-login--forget-password"), e.removeClass("m-login--signup"), e.addClass("m-login--signin"), e.find(".m-login__signin").animateClass("flipInX animated")
        },
        r = function() {
            e.removeClass("m-login--signin"), e.removeClass("m-login--signup"), e.addClass("m-login--forget-password"), e.find(".m-login__forget-password").animateClass("flipInX animated")
        },
        n = function() {
            $("#m_login_forget_password").click(function(e) {
                e.preventDefault(), r()
            }), $("#m_login_forget_password_cancel").click(function(e) {
                e.preventDefault(), t()
            }), $("#m_login_signup").click(function(e) {
                e.preventDefault(), a()
            }), $("#m_login_signup_cancel").click(function(e) {
                e.preventDefault(), t()
            })
        },
        l = function() {
            $("#m_login_signin_submit").click(function(e) {
                e.preventDefault();
                var a = $(this),
                    t = $(this).closest("form");
                t.validate({
                    rules: {
                        username: {
                            required: !0,
                        },
                        password: {
                            required: !0
                        }
                    }
                }), t.valid() && (a.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), setTimeout(function() {
                    $('#sign_in_form').submit();
                }, 500))
            })
        },
        ul = function() {
            $("#submit_scheme_form").click(function(e) {
                e.preventDefault();
                var a = $(this),
                    t = $(this).closest("form");
                t.validate({
                    rules: {
                        scheme_name: {
                            required: !0,
                        },
                        address: {
                            required: !0,
                        },
                        start_date: {
                            required: !0,
                        },
                        board: {
                            required: !0,
                        },
                        completion_date: {
                            required: !0,
                        },
                    }
                }), t.valid() && (a.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), setTimeout(function() {
                    $('#scheme_form').submit();
                }, 500))
            })
        },
        wf = function() {
            $("#work_form_submit").click(function(e) {
                e.preventDefault();
                var a = $(this),
                    t = $(this).closest("form");
                t.validate({
                    rules: {
                        work_type: {
                            required: !0,
                        },
                        parent_work_key: {
                            required: !0,
                        },
                        budget_details: {
                            required: !0,
                        },
                        budget_pg: {
                            required: !0,
                        },
                        budget_sr_suffix: {
                            required: !0,
                        },
                        department: {
                            required: !0,
                        },
                        budget_expenditure: {
                            required: !0,
                        },
                        approval_authority: {
                            required: !0,
                        },
                        board: {
                            required: !0,
                        },
                        sub_board: {
                            required: !0,
                        },
                        executive_engineer: {
                            required: !0,
                        },
                        major: {
                            required: !0,
                        },
                        work_type_secondary: {
                            required: !0,
                        },
                        type_details: {
                            required: !0,
                        },
                        sub_major: {
                            required: !0,
                        },
                        finantial_year: {
                            required: !0,
                        },
                        type_details: {
                            required: !0,
                        },
                        ledger_details: {
                            required: !0,
                        },
                        work_code: {
                            required: !0,
                        },
                        chief_accounts_details: {
                            required: !0,
                        },
                        sub_ledger_details: {
                            required: !0,
                        },
                        revised_budget: {
                            required: !0,
                        },
                        budget_provision: {
                            required: !0,
                        },
                        approval_status: {
                            required: !0,
                        },
                        work_name_details: {
                            required: !0,
                        },
                        work_description_details: {
                            required: !0,
                        },
                    }
                }), t.valid() && (a.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), setTimeout(function() {
                    $('#work_form').submit();
                }, 500))
            })
        },
        wod = function() {
            $("#work_order_form_submit").click(function(e) {
                e.preventDefault();
                var a = $(this),
                    t = $(this).closest("form");
                t.validate({
                    rules: {
                        work_order_no: {
                            required: !0,
                        },
                        work_order_date: {
                            required: !0,
                        },
                        implementing_agency: {
                            required: !0,
                        },
                        consultant_architect: {
                            required: !0,
                        },
                        third_party_agency: {
                            required: !0,
                        },
                        gov_associated_agency: {
                            required: !0,
                        },
                        tender_submission_date: {
                            required: !0,
                        },
                        sd_current: {
                            required: !0,
                        },
                        fdr_bank_name: {
                            required: !0,
                        },
                        agreement_seal_date: {
                            required: !0,
                        },
                        agreement_number: {
                            required: !0,
                        },
                        fdr_number: {
                            required: !0,
                        },
                        fdr_amount: {
                            required: !0,
                        },
                        fdr_date: {
                            required: !0,
                        },
                        emd_number: {
                            required: !0,
                        },
                        emd_amount: {
                            required: !0,
                        },
                        emd_date: {
                            required: !0,
                        },
                        stamp_duty_amt: {
                            required: !0,
                        },
                        bank_solvency_amt: {
                            required: !0,
                        },
                        bank_solvency_number: {
                            required: !0,
                        },
                        bank_guarantee_amt: {
                            required: !0,
                        },
                        bank_guarantee_number: {
                            required: !0,
                        },
                        bank_guarantee_date: {
                            required: !0,
                        },
                        stipulated_start_date: {
                            required: !0,
                        },
                        stipulated_end_date: {
                            required: !0,
                        },
                        performance_security_number: {
                            required: !0,
                        },
                        performance_security_amt: {
                            required: !0,
                        },
                        performance_security_date: {
                            required: !0,
                        },
                        remarks: {
                            required: !0,
                        },
                    }
                }), t.valid() && (a.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), setTimeout(function() {
                    $('#work_order_form').submit();
                }, 500))
            })
        },        
        uc = function() {
            $("#submit_user_form").click(function(e) {
                e.preventDefault();
                var a = $(this),
                    t = $(this).closest("form");
                t.validate({
                    rules: {
                        name: {
                            required: !0,
                        },
                        last_name: {
                            required: !0,
                        },
                        email: {
                            required: !0,
                            email: !0
                        },
                        mobilenumber: {
                            required: !0,
                            minlength: 10,
                            maxlength: 10,
                            number: true
                        },
                        designation: {
                            required: !0,
                        },
                        username: {
                            required: !0,
                        },
                        password: {
                            required: !0,
                            minlength: 6,
                        },
                        department: {
                            required: !0,
                        },
                        board: {
                            required: !0,
                        },
                    }
                }), t.valid() && (a.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), setTimeout(function() {
                    $('#user_form').submit();
                }, 500))
            })
        },
        ss = function() {
            $("#stage_select_form_submit").click(function(e) {
                e.preventDefault();
                var a = $(this),
                    t = $(this).closest("form");
                t.validate({
                    rules: {
                        stage_name: {
                            required: !0,
                        },
                        stage_type: {
                            required: !0,
                        },
                        expected_completion_date: {
                            required: !0,
                        },
                    }
                }), t.valid() && (a.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), setTimeout(function() {
                    $('#stage_select_form').submit();
                }, 500))
            })
        },
        bfs = function() {
            $("#bill_form_submit").click(function(e) {
                e.preventDefault();
                var a = $(this),
                    t = $(this).closest("form");
                t.validate({
                    rules: {
                        bill_raised: {
                            required: !0,
                        },
                        bill_raised_amount: {
                            required: function(element) {
                                return (get_bill_details_required() == 'Yes');
                            }
                        },
                        invoice_number_bill: {
                            required: function(element) {
                                return (get_bill_details_required() == 'Yes');
                            }
                        },
                        bill_status: {
                            required: function(element) {
                                return (get_bill_details_required() == 'Yes');
                            }
                        },
                    }
                }), t.valid() && (a.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), setTimeout(function() {
                    $('#bill_form').submit();
                }, 500))
            })
        },
        up = function() {
            $("#update_stage_form_submit").click(function(e) {
                e.preventDefault();
                var a = $(this),
                    t = $(this).closest("form");
                t.validate({
                    rules: {
                        stage: {
                            required: !0,
                        },
                        actual_completion_date: {
                            required: !0,
                        },
                    }
                }), t.valid() && (a.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), setTimeout(function() {
                    $('#update_stage_form').submit();
                }, 500))
            })
        },
        s = function() {
            $("#m_login_signup_submit").click(function(a) {
                a.preventDefault();
                var r = $(this),
                    n = $(this).closest("form");
                n.validate({
                    rules: {
                        firstname: {
                            required: !0
                        },
                        lastname: {
                            required: !0
                        },
                        email: {
                            required: !0,
                            email: !0
                        },
                        mobilenumber: {
                            required: !0,
                            minlength: 10,
            				maxlength: 10,
            				number: true
                        },
                        password: {
                            required: !0,
                            minlength: 6,
                        },
                        rpassword: {
                            required: !0,
                            equalTo : "#password"
                        },
                        agree: {
                            required: !0
                        }
                    }
                }), n.valid() && (r.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), 
                setTimeout(function() {
                    var email_val = $('#email_val').val();
                    $.ajax({
                       url : BASE_URL+'login/check_email_valid',
                       type: 'post', 
                       data: {email_val: email_val},
                       success: function(response){ 
                        if(response == '1')
                        {
                          $('#sign_up_form').submit();
                        }
                        else{
                            $('#email_error').show();
                            r.attr("disabled", false);
                            r.removeClass("m-loader m-loader--right m-loader--light");
                        }
                      }
                   }); 
                    //r.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1), n.clearForm(), n.validate().resetForm(), t();
                    //a.clearForm(), a.validate().resetForm(), i(a, "success", "Thank you. To complete your registration please check your email.")
                }, 500))
            })
        },
        o = function() {
            $("#m_login_forget_password_submit").click(function(a) {
                a.preventDefault();
                var r = $(this),
                    n = $(this).closest("form");
                n.validate({
                    rules: {
                        email: {
                            required: !0,
                            email: !0
                        }
                    }
                }), n.valid() && (r.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), 
                setTimeout(function() {
                    $('#forgot_password_form').submit();
                }, 500))
            })
        };
    return {
        init: function() {
            n(), l(), s(), o() , ul() , ss() , up() , uc() , wf() ,wod() , bfs()
        }
    }
}();
jQuery(document).ready(function() {
    SnippetLogin.init()
});