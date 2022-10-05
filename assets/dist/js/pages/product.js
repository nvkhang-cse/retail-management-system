function load_maincontent(url_attr){
    $.ajax({
      type: "POST",
      url: url_attr,
      dataType: "json",
      encode: true,
      headers: {'Authorization': localStorage.getItem('auth_token')},
      success: function(response){
        $("#page_content").html(response.data);
        var template = $("#tb_template").html();
        var text = Mustache.render(template, response.data);

        $("#product_table_1").html(text);      }
    });
  }