<button style = "right : 10px ; top : 0px ; position : fixed ; z-index : 3" onclick = "window.print()">print page</button>
<style>
    @media print{
  div{
    display :none;
  }
 
  table{
    display : inline-block;
    width : 25%;
    height : 350px;
  }
 img{
  object-fit : contain;
 }
  button{
    display : none;
  }
}
</style>