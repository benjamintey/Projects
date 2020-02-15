<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
<div>
<li id="li-2019-01-07" class=" start  JC">7<span>CP</span></li>
</div>
<script>
  $("div").click(function(){
    $.post("index.php",
    {
      name: "Donald Duck",
      city: "Duckburg"
    },
    function(data,status){
      alert("Data: " + data + "\nStatus: " + status);
    });
  });
});
</script>
</body>
</html>
