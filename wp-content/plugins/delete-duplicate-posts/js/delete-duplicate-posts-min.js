"use strict";function cp_ddp_freemius_opt_in(e){var t=jQuery("#cp-ddp-freemius-opt-nonce").val(),a=jQuery(e).data("opt");jQuery.ajax({type:"POST",url:ajaxurl,async:!0,data:{action:"cp_ddp_freemius_opt_in",opt_nonce:t,choice:a},success:function(){location.reload()},error:function(e,t,a){console.log(e.statusText),console.log(t),console.log(a)}})}jQuery(document).ready((function(){var e=[];function t(){jQuery("#ddp_log").empty(),jQuery.ajax({type:"POST",url:ajaxurl,data:{_ajax_nonce:cp_ddp.loglines_nonce,action:"ddp_get_loglines"},dataType:"json",success:function(e){var t=e.data.results;t&&jQuery.each(t,(function(e,t){jQuery("#ddp_log").append("<li><code>"+t.datime+"</code> "+t.note+"</li>")})),jQuery("#log .spinner").removeClass("is-active")}}).fail((function(e){jQuery("#log .spinner").removeClass("is-active"),window.console&&window.console.log&&window.console.log(e.statusCode+" "+e.statusText)}))}function a(e,d,o){jQuery("#ddp_container #ddp_buttons input").each((function(){jQuery(this).prop("disabled",!0)})),jQuery("#ddp_container #dashboard .spinner").addClass("is-active"),jQuery.ajax({type:"POST",url:ajaxurl,data:{_ajax_nonce:cp_ddp.nonce,action:"ddp_get_duplicates",stepid:e},dataType:"json",success:function(e){var s=e.data.dupes;s?(jQuery("#ddp_container #dashboard .statusdiv .statusmessage").html(e.data.msg).show(),jQuery("#ddp_container #dashboard .statusdiv .dupelist .duplicatetable").show(),jQuery.each(s,(function(e,t){jQuery("#ddp_container #dashboard .statusdiv .dupelist .duplicatetable tbody").append('<tr><th scope="row" class="check-column"><label class="screen-reader-text" for="cb-select-'+t.ID+'">Select Post</label><input id="cb-select-'+t.ID+'" type="checkbox" name="delpost[]" value="'+t.ID+'"><div class="locked-indicator"></div></th><td><a href="'+t.permalink+'" target="_blank">'+t.title+"</a> (ID #"+t.ID+" type:"+t.type+" status:"+t.status+')</td><td><a href="'+t.orgpermalink+'" target="_blank">'+t.orgtitle+"</a> (ID #"+t.orgID+")"+t.why+"</td></tr>")})),jQuery("#ddp_container #dashboard .statusdiv .dupelist .duplicatetable tbody").slideDown(),jQuery("#ddp_container #ddp_buttons input").each((function(){jQuery(this).prop("disabled",!1)}))):jQuery("#ddp_container #dashboard .statusdiv .statusmessage").html(e.data.msg).show(),jQuery("#ddp_container #dashboard .spinner").removeClass("is-active"),"-1"==e.data.nextstep||parseInt(e.data.nextstep)>0&&a(parseInt(e.data.nextstep),d,o),t()}}).fail((function(e){t(),jQuery("#ddp_container #dashboard .spinner").removeClass("is-active"),window.console&&window.console.log&&window.console.log(e.statusCode+" "+e.statusText)}))}e.stepid=0,a(1,e),jQuery(document).on("click","#deleteduplicateposts_deleteall",(function(d){d.preventDefault(),jQuery("#log .spinner").addClass("is-active");var o=[];if(jQuery(".duplicatetable input[name='delpost[]']:checked").each((function(){o.push(parseInt(jQuery(this).val()))})),void 0===o||0===o.length)return alert(cp_ddp.text_selectsomething),!1;confirm(cp_ddp.text_areyousure)&&(jQuery("#ddp_container .dupelist .duplicatetable tbody").empty(),jQuery.ajax({type:"POST",url:ajaxurl,data:{_ajax_nonce:cp_ddp.deletedupes_nonce,action:"ddp_delete_duplicates",checked_posts:o},dataType:"json",success:function(){a(1,e),t()}}).fail((function(d){jQuery("#log .spinner").removeClass("is-active"),window.console&&window.console.log&&(window.console.log(d.statusCode+" "+d.statusText),a(1,e),t())})))})),jQuery(document).on("click","#deleteduplicateposts_resetview",(function(d){d.preventDefault(),jQuery("#ddp_container .dupelist .duplicatetable tbody").empty(),a(1,e),t()})),jQuery(document).on("click",".ddpcomparemethod li",(function(){jQuery(".ddpcomparemethod input:radio").each((function(){this.checked?jQuery(this).closest("li").find(".ddp-compare-details").show():jQuery(this).closest("li").find(".ddp-compare-details").hide()}))})),jQuery(".ddpcomparemethod li").trigger("click")}));
//# sourceMappingURL=delete-duplicate-posts-min.js.map