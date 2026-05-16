<html>

<style>
.people{
	
	box-shadow:1px 1px 1px 1px #cccccc;
	border-radius:50%;
}
dialog{
  border: none;
  box-shadow: 0 2px 6px #ccc;
  border-radius: 10px;
}
dialog::backdrop {
  background-color: rgba(0, 0, 0, 0.1);
}
</style>


<body>
<img class="people" id="people" src="img/2.png" width="40px">
<dialog id="infoModal">
  <button id="close">X</button>
  <p>這是 html 的 dialog!!</p>

</dialog>
<script>
let btn=document.querySelector("#people");
let infoModal=document.querySelector("#infoModal");
let close=document.querySelector("#close");
btn.addEventListener("click", function(){
  infoModal.showModal();
})
close.addEventListener("click", function(){
  infoModal.close();
})
</script>


</body>
</html>