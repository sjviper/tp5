RTE.param_template="";
RTE.postDialogShow=function(a){RTE.param_template=a.param_template;$("td.routine_param_remove").show();$("input[name=routine_removeparameter]").remove();$("input[name=routine_addparameter]").css("width","100%");$("table.routine_params_table").last().find("th[colspan=2]").attr("colspan","index.view.1");$("table.routine_params_table").last().find("tr").has("td").each(function(){RTE.setOptionsForParameter($(this).find("select[name^=item_param_type]"),$(this).find("input[name^=item_param_length]"),$(this).find("select[name^=item_param_opts_text]"),
$(this).find("select[name^=item_param_opts_num]"))});RTE.setOptionsForParameter($("table.rte_table").last().find("select[name=item_returntype]"),$("table.rte_table").last().find("input[name=item_returnlength]"),$("table.rte_table").last().find("select[name=item_returnopts_text]"),$("table.rte_table").last().find("select[name=item_returnopts_num]"))};
RTE.validateCustom=function(){var a=true,c="";$("table.routine_params_table").last().find("tr").each(function(){if(a)$(this).find(":input").each(function(){c=$(this).attr("name");if(c.substr(0,14)==="item_param_dir"||c.substr(0,15)==="item_param_name"||c.substr(0,15)==="item_param_type")if($(this).val()===""){$(this).focus();return a=false}});else return false});if(!a){alert(PMA_messages.strFormEmpty);return false}$("table.routine_params_table").last().find("tr").each(function(){var d=$(this).find("select[name^=item_param_type]"),
f=$(this).find("input[name^=item_param_length]");if(d.length&&f.length)if((d.val()==="ENUM"||d.val()==="SET"||d.val().substr(0,3)==="VAR")&&f.val()===""){f.focus();return a=false}});if(!a){alert(PMA_messages.strFormEmpty);return false}if($("select[name=item_type]").find(":selected").val()==="FUNCTION"){var b=$("select[name=item_returntype]"),e=$("input[name=item_returnlength]");if((b.val()==="ENUM"||b.val()==="SET"||b.val().substr(0,3)==="VAR")&&e.val()===""){e.focus();alert(PMA_messages.strFormEmpty);
return false}}if($("select[name=item_type]").find(":selected").val()==="FUNCTION")if($("table.rte_table").find("textarea[name=item_definition]").val().toUpperCase().indexOf("RETURN")<0){RTE.syntaxHiglighter.focus();alert(PMA_messages.MissingReturn);return false}return true};
RTE.setOptionsForParameter=function(a,c,b,e){var d=b.parent().parent().find(".no_opts"),f=c.parent().parent().find(".no_len");switch(a.val()){case "TINYINT":case "SMALLINT":case "MEDIUMINT":case "INT":case "BIGINT":case "DECIMAL":case "FLOAT":case "DOUBLE":case "REAL":b.parent().hide();e.parent().show();d.hide();break;case "TINYTEXT":case "TEXT":case "MEDIUMTEXT":case "LONGTEXT":case "CHAR":case "VARCHAR":case "SET":case "ENUM":b.parent().show();e.parent().hide();d.hide();break;default:b.parent().hide();
e.parent().hide();d.show()}switch(a.val()){case "DATE":case "DATETIME":case "TIME":case "TINYBLOB":case "TINYTEXT":case "BLOB":case "TEXT":case "MEDIUMBLOB":case "MEDIUMTEXT":case "LONGBLOB":case "LONGTEXT":b.closest("tr").find("a:first").hide();c.parent().hide();f.show();break;default:a.val()=="ENUM"||a.val()=="SET"?b.closest("tr").find("a:first").show():b.closest("tr").find("a:first").hide();c.parent().show();f.hide()}};
$(document).ready(function(){$("input[name=routine_addparameter]").live("click",function(a){a.preventDefault();a=$(".routine_params_table").last();var c=RTE.param_template.replace(/%s/g,a.find("tr").length-1);a.append(c);if($("table.rte_table").find("select[name=item_type]").val()==="FUNCTION"){$("tr.routine_return_row").show();$("td.routine_direction_cell").hide()}a=$("table.routine_params_table").last().find("tr").has("td").last();RTE.setOptionsForParameter(a.find("select[name^=item_param_type]"),
a.find("input[name^=item_param_length]"),a.find("select[name^=item_param_opts_text]"),a.find("select[name^=item_param_opts_num]"))});$("a.routine_param_remove_anchor").live("click",function(a){a.preventDefault();$(this).parent().parent().remove();var c=0;$("table.routine_params_table").last().find("tr").has("td").each(function(){$(this).find(":input").each(function(){var b=$(this).attr("name");if(b.substr(0,14)==="item_param_dir")$(this).attr("name",b.substr(0,14)+"["+c+"]");else if(b.substr(0,15)===
"item_param_name")$(this).attr("name",b.substr(0,15)+"["+c+"]");else if(b.substr(0,15)==="item_param_type")$(this).attr("name",b.substr(0,15)+"["+c+"]");else if(b.substr(0,17)==="item_param_length"){$(this).attr("name",b.substr(0,17)+"["+c+"]");$(this).attr("id","item_param_length_"+c)}else if(b.substr(0,20)==="item_param_opts_text")$(this).attr("name",b.substr(0,20)+"["+c+"]");else b.substr(0,19)==="item_param_opts_num"&&$(this).attr("name",b.substr(0,19)+"["+c+"]")});c++})});$("select[name=item_type]").live("change",
function(){$("tr.routine_return_row, td.routine_direction_cell, th.routine_direction_cell").toggle()});$("select[name^=item_param_type]").live("change",function(){var a=$(this).parents("tr").first();RTE.setOptionsForParameter(a.find("select[name^=item_param_type]"),a.find("input[name^=item_param_length]"),a.find("select[name^=item_param_opts_text]"),a.find("select[name^=item_param_opts_num]"))});$("select[name=item_returntype]").live("change",function(){RTE.setOptionsForParameter($("table.rte_table").find("select[name=item_returntype]"),
$("table.rte_table").find("input[name=item_returnlength]"),$("table.rte_table").find("select[name=item_returnopts_text]"),$("table.rte_table").find("select[name=item_returnopts_num]"))});$("a.ajax_exec_anchor").live("click",function(a){a.preventDefault();var c=PMA_ajaxShowMessage();$.get($(this).attr("href"),{ajax_request:true},function(b){if(b.success===true){PMA_ajaxRemoveMessage(c);if(b.dialog){RTE.buttonOptions[PMA_messages.strGo]=function(){var e=$("form.rte_form").last().serialize();c=PMA_ajaxShowMessage(PMA_messages.strProcessingRequest);
$.post("db_routines.php",e,function(d){if(d.success===true){PMA_ajaxRemoveMessage(c);PMA_slidingMessage(d.message);$ajaxDialog.dialog("close")}else PMA_ajaxShowMessage(d.error,false)})};RTE.buttonOptions[PMA_messages.strClose]=function(){$(this).dialog("close")};$ajaxDialog=$("<div>"+b.message+"</div>").dialog({width:650,buttons:RTE.buttonOptions,title:b.title,modal:true,close:function(){$(this).remove()}});$ajaxDialog.find("input[name^=params]").first().focus();$ajaxDialog.find("input.datefield, input.datetimefield").each(function(){PMA_addDatepicker($(this).css("width",
"95%"))})}else PMA_slidingMessage(b.message)}else PMA_ajaxShowMessage(b.error,false)})})});
