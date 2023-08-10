<?php
if(!isset($_SERVER['POST']['redirected'])){
    echo"
    <script>
    history.go(-1);
    </script>";
    die();
     }
     ?>
<style>
    @media print{
  div{
    display :none;
  }

  button{
    display: none;
  }

  .tables{
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-start;
 }
}

.cetak{
  transition-duration: 0.4s;
  height :50px;
  width : auto ;
  background-color: #333333; 
  color: white; 
  font-family: "Lucida Console", "Courier New", monospace;
  font-size : 15px ;
  text-align: center;
  border: 2px solid black;
  top : 103px;
  right: 0px;
  position : fixed;
  z-index : 3;
}
.cetak:hover {
  transition-duration: 0.4s;
  background-color: white;
  color : #333333 ;
}

</style>
<button type = "button"  class = "cetak" onclick = "window.print()">Cetak</button>