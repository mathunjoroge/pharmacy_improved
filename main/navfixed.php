<body style="text-transform:capitalize;">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner" id="nav">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#"><img src="ico/logo.PNG" style="height:35px;">
          <div class="nav-collapse collapse">
          
            <ul class="nav pull-right"></a><li></li>
<li style="font-size:0.8em;"><a href="../../index.php"><font color="white">HOME</font></a></li>
            <li class="active" style="font-size:0.8em;"><a href="index.php"><font color="blue">PHARMACY</font></a></li>
            <li  style="font-size:0.8em;"><a href="../../hie/index.php"><font color="white">INFO EXCHANGE </font></a></li>
            <li style="font-size:0.8em;"><a href="../../drug/index.php"><font color="white">DRUG INDEX</font></a></li>
            <li  style="font-size:0.8em;"><a href="../../cancers/index.php"><font color="white">CANCER GUIDE</font></a></li>
            <li style="font-size:0.8em;"><a href="../../diseases/index.php"><font color="white">Rx GUIDE</font></a></li>
            
              <li><a><i class="icon-user icon-large"></i> Welcome:<strong> <?php echo $_SESSION['SESS_LAST_NAME'];?></strong></a>
      <body style="background-image: url(images/background.jpg);">							

				</a></li>
              <li><a href="../index.php"><font color="red"><i class="icon-off icon-large"></i></font> Log Out</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
     <script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
<!-- Begin
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</SCRIPT>