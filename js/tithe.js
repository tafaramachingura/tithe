var dfm=document.getElementsByClassName("dfm").value;



function tickcheckbox(){
$.ajax({
  type:"POST",
  url:'new/load.php',
  datatype:JSON,
success:function(data){
var results=JSON.parse(data);
var paid=document.getElementsByClassName("paid");
var amount=document.getElementsByClassName("amount");
var date=document.getElementsByClassName("date");
for(var x=0;x<paid.length;x++){
  for(var i=0;i<results.length;i++){
var id=results[i].member_id

if(paid[x].id===id){
  paid[x].checked=true
  amount[x].innerHTML="$"+results[i].amount
  date[x].innerHTML=results[i].date


}


}}

}
})
}


//***********************************************************************************************************
function tickcheckbox2(){
var email=document.getElementById('emails').value
$.ajax({
  type:"POST",
  url:'new/searchuser.php',
  data:{'email':email},
success:function(data){
var results=JSON.parse(data);
var paid=document.getElementsByClassName("paid");
var amount=document.getElementsByClassName("amount");
var date=document.getElementsByClassName("date");

for(var x=0;x<paid.length;x++){
  for(var i=0;i<results.length;i++){
var id=results[i].montid

if(paid[x].id===id){

  paid[x].checked=true
  amount[x].innerHTML="$"+results[i].amount
  date[x].innerHTML=results[i].date


}


}}

}
})
}
function tickcheckbox3(){
var months=document.getElementById('month').value
$.ajax({
  type:"POST",
  url:'new/load2.php',
data:{'monthid':months},
success:function(data){
var results=JSON.parse(data);
var paid=document.getElementsByClassName("paid");
var amount=document.getElementsByClassName("amount");
var date=document.getElementsByClassName("date");

for(var x=0;x<paid.length;x++){
  for(var i=0;i<results.length;i++){
var id=results[i].member_id

if(paid[x].id===id){

  paid[x].checked=true
  amount[x].innerHTML="$"+results[i].amount
  date[x].innerHTML=results[i].date


} } } } }) }
//**********************************************************************************************************************8

//*********************************************************************************************************************







function searchmembers(){

	$("#search1").click(function(){
			var email=document.getElementById("emails").value
      if(email!=''){
		$.ajax({
			type:'POST',
			url:'new/search.php',
			data:{'email':email},
			success:function(data){
console.log(data);

			$(".searched").html(data);


$.ajax({

type:'POST',
url:'new/searchuser.php',
data:{'email':email},
success:function(response){
console.log(response);
$(".foot").css('display','none');
tickcheckbox2();
}

})
    }
		})
  }
})


}




function search2(){
  $(".search2").click(function(){
      var emails=document.getElementById('emails').value
          var month=document.getElementById("month").value

if(emails!==''){
            $.ajax({
              type:'post',
              url:'update/searchuser.php',
              data:{'email':emails},
              success:function(data){
      $(".searched").html(data);

                        //the post data to tick tickcheckbox
                        $.ajax({

                        type:'POST',
                        url:'new/searchuser.php',
                        data:{'email':emails},
                        success:function(response){

                        console.log(response);
                        $(".foot").css('display','none');
  tickcheckbox2()

                        }

                        })
                      }
                        // end of tich checkbox
            })
}
           else if(month!==''){

          $.ajax({
              type:'post',
              url:'update/searchmonth.php',
              data:{'date':month},
              success:function(data){
                $('.searched').html(data)
                       $.ajax({
                         type:'post',
                         url:'new/load2.php',
                         data:{'monthid':month},
                         success:function(data){

                            tickcheckbox3()

                                  }
                                 })
              }
            })

          }
})

}


$("#reg").submit(function(e){
e.preventDefault()
  var name=document.getElementById("name").value
  var sname=document.getElementById('sname').value
  var amount=document.getElementById("amount").value
  var month=document.getElementById('mon').value
  $.ajax({
    type:'POST',
    url:'tithe.php',
    data:{'name':name,'sname':sname,'amount':amount,'month':month},
    success:function(data){
      console.log(data)

if(data==='date_format')

          {
            alert("enter date formart as provided");
              window.location.href='dashboard.php';
}
else if(data==='confirm'){
        if(confirm('user have already paid tithe add anyway')){


        $.ajax({
          type:'post',
          url:'new/confirm.php',
            data:{'name':name,'sname':sname,'amount':amount,'month':month},
            success:function(response){
              console.log(response);
              window.location.href='dashboard.php';
            }
        })
      }
      else{
          window.location.href='dashboard.php';
      }
    }
      else if(data==='inserted'){
      alert("tithe registered successfully");
        window.location.href='dashboard.php';
    }
    else if(data==='failed'){
      alert("member does not exit register first");
        window.location.href='dashboard.php';

    }
    }
  })
})

function confirm_delete(e)
{
if(confirm('are you sure to delete this member'))
{
  var user_id=e

  $.ajax({
    type:'post',
    url:'update/delete.php',
    data:{'user_id':user_id},
    success:function(data){
      alert('deleted');
      window.location.href='dashboard.php';
    }
  })
}
}


function zoom(e){
  $("#view").css('display','block')
var zoomed=document.getElementById('views')
zoomed.src=e.src
zoomed.style.width="500px"

}
$(".close").click(function(e){
$("#view").css("display","none")
})

$(document).ready(function(){
  $(".loader").css('display','none');
})
