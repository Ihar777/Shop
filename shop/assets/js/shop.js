$(document).ready(function() {

    $('#search_text_input').focus(function() {
        if(window.matchMedia( "(min-width: 800px)" ).matches) {
            $(this).animate({width: '+=250px'}, 500);
        }
    });

    $('#search_text_input').blur(function() {
        if(window.matchMedia( "(min-width: 800px)" ).matches) {
            $(this).animate({width: '-=250px'}, 500);
        }
    });

    $('.button_holder').on('click', function() {
        document.search_form.submit();
    });

   // Button for profile post
    $('#submit_profile_post').click(function(){
        
        $.ajax({
            type: "POST",
            url: "includes/handlers/ajax_submit_profile_post.php",
            data: $('form.profile_post').serialize(),
            success: function(msg) {
                $("#post_form").modal('hide');
                location.reload();
            },
            error: function() {
                alert('Failure');
            }
        });

    });


});

// $(document).click(function(e) {

//         if(e.target.class != "search_results" && e.target.id != "search_text_input") {
//             $(".search_results").html("");
//             $(".search_results_footer").html("");
//             $(".search_results_footer").toggleClass("search_results_footer_empty");
//             $(".search_results_footer").toggleClass("search_results_footer");
//         }

//         if(e.target.class != "dropdown_data_window") {
//             $(".dropdown_data_window").html("");
//             $(".dropdown_data_window").css({"padding" : "0px", "height" : "0px"});
    
//         }
// });


// function getUsers(value, user) {
//     $.post("includes/handlers/ajax_friend_search.php", {query:value, userLoggedIn:user}, function(data) {
//         $(".results").html(data);
//     });
// }

// function getDropdownData(user, type) {

//     if($(".dropdown_data_window").css("height") == "0px") {

//         var pageName;

//         if(type == 'notification') {
//             pageName = "ajax_load_notifications.php";
//             $("span").remove("#unread_notification");
//         }
//         else if (type == 'message') {
//             pageName = "ajax_load_messages.php";
//             $("span").remove("#unread_message");
//         }

//         var ajaxreq = $.ajax({
//             url: "includes/handlers/" + pageName,
//             type: "POST",
//             data: "page=1&userLoggedIn=" + user,
//             cache: false,

//             success: function(response) {
//                 $(".dropdown_data_window").html(response);
//                 $(".dropdown_data_window").css({"padding" : "0px", "height": "280px", "border" : "1px solid #DADADA"});
//                 $("#dropdown_data_type").val(type);
//             }

//         });

//     }
//     else {
//         $(".dropdown_data_window").html("");
//         $(".dropdown_data_window").css({"padding" : "0px", "height": "0px", "border" : "none"});
//     }

// }

function getLiveSearchProducts(value) {

    $.post("includes/handlers/ajax_search.php", {query:value}, function(data) {

        if($(".search_results_footer_empty")[0]) {
            $(".search_results_footer_empty").toggleClass("search_results_footer");
            $(".search_results_footer_empty").toggleClass("search_results_footer_empty");
        }

        $('.search_results').html(data);
        $(".search_results_footer").html("<a href='search.php?q=" + value + "'>Все результаты</a>");
       

        if(data == "") {
            $("#gh").remove();
            $(".search_results_footer").html("");
            $(".search").append("<h2 id='gh' align='center'>Ничего не найдено</h2>");
            $(".search_results_footer").toggleClass("search_results_footer_empty");
            $(".search_results_footer").toggleClass("search_results_footer");
        }

        // if(data == 0) {
        //     $(".search_results_footer").html("Товары, отвечающие указанным критериям, не найдены");
        // }

    });

}


// function getCatProducts(query) {

//     $.ajax("includes/handlers/ajax_search_cat.php", {query: <?php echo $id; ?> }, function(data) {

        

//         $("#main_content").html(data);
       

//         if(data == "") {
//             $("#main_content").empty();
//             $("#main_content").html("<h2 align='center'>Ничего не найдено</h2>");
//         }

//         // if(data == 0) {
//         //     $(".search_results_footer").html("Товары, отвечающие указанным критериям, не найдены");
//         // }

//     });

// }


