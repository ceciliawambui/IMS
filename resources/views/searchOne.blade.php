<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Search Products</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
 
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
 
body{
  background: white;
  padding: 0 20px;
}
 
::selection{
  color: #fff;
  background: white;
}
 
.wrapper{
  max-width: 450px;
  margin: 150px auto;
}
 
.wrapper .search-input{
  background: black;
  width: 100%;
  border-radius: 5px;
  position: relative;
  box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12);
}
 
.search-input input{
  height: 55px;
  width: 100%;
  outline: none;
  border: none;
  border-radius: 5px;
  padding: 0 60px 0 20px;
  font-size: 18px;
  box-shadow: 0px 1px 5px rgba(0,0,0,0.1);
}
 
.no-bullets {
    list-style-type: none;
}
 
.search-input.active input{
  border-radius: 5px 5px 0 0;
}
 
.search-input .autocom-box{
  padding: 0;
  opacity: 0;
  pointer-events: none;
  max-height: 280px;
  overflow-y: auto;
}
 
.search-input.active .autocom-box{
  padding: 10px 8px;
  opacity: 1;
  pointer-events: auto;
}
 
.autocom-box li{
  list-style: none;
  padding: 8px 12px;
  display: none;
  width: 100%;
  cursor: default;
  border-radius: 3px;
}
 
.search-input.active .autocom-box li{
  display: block;
}
.autocom-box li:hover{
  background: #efefef;
}
 
.search-input .icon{
  position: absolute;
  right: 0px;
  top: 0px;
  height: 55px;
  width: 55px;
  text-align: center;
  line-height: 55px;
  font-size: 20px;
  color: #644bff;
  cursor: pointer;
 
}
.TextOverride
{
 color: black !important;
}
</style>
</head>
  <body>
    <div class="wrapper">
      <h3 class="TextOverride" align="center">Search Products</h3>
      <br>
      <form name="auto_search" id="suggestion" method="post" action="{{route('search.list')}}">
      @csrf
      <div class="search-input">
        <a href="" target="_blank" hidden></a>
        <input type="text" class="form-control" placeholder="Type to search..." id="search_text" name="search_keyword">
        <div id="suggesstion-box"></div>
        <div class="icon"><i class="fas fa-search"></i></div>
      </div>
    </form>
    </div>
 </body>
</html>
 
  <script>
    $(document).ready(function(){
    $("#search_text").keyup(function(){
    $.ajax({
    type: "GET",
    url: "{{ route('searchajax') }}",
    data:'search='+$(this).val(),
    success: function(data){
      $("#suggesstion-box").show();
      $("#suggesstion-box").html(data);
    }
    });
        if($("#search_text").val() == ''){
          $("#suggesstion-box").hide();
        }
    });
    });
    function selectval(val) {
    $("#search_text").val(val);
    $('#suggestion')[0].submit();
    $("#suggesstion-box").hide();
 }
</script>