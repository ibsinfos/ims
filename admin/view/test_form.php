<html>
    <head>


<script src="js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
<script>
    jQuery(document).ready(function(){
$("#myform").validationEngine();
});
</script>
</head>
<body>
<form  method="post" action="#" id="myform">
        <fieldset>
            
            Select user  Designation 
                <select id="classes" name="user_type">
                    <option>abd</option>
                    <option>cds</option>
                 </select>
            <br/>
            Abc:<input name="fname"  value="" type="text" class="validate[required] text-input" onblur="check_vals();"/>
            <br/>
            Abc:<input name="fname"  value="" type="text" class="validate[required]" onblur="check_vals();"/>
                <br/>
                <button type="submit" class="btn btn-info"><i class="icon-zoom-in icon-white"></i> Browse</button>
            
        </fieldset>
    </form>
    </body>
</html>