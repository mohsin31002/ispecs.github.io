<!DOCTYPE html>
<?php 
            $skuu=$_GET['sku'];
//echo "<script>console.log('php_array: ".$skuu."');</script>";
//echo "<button onclick='JEEWIDGET.load('.$skuu.')'>Model 5</button>";

          ?>
<html>
  <head>
    <title>iSpecs</title>
    <link rel="icon" type="image/ico" href="../img/specs.png">
    <meta charset='utf-8' />

    <!-- INCLUDE MAIN SCRIPT -->
    <script type='text/javascript' src='https://appstatic.jeeliz.com/jeewidget/JeelizNNCwidget.js'></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type='text/javascript'>
      // function which are used only for this functionnal test
      function test_resizeCanvas() 
      {
        const wid = document.getElementById('JeeWidget')
        wid.style.width = '1000px'
      }

      // main function, launched with body.onload()
      function main() 
      {
        JEEWIDGET.start({
        
          


         // sku: '.$skuu.',
         sku: '<?php echo ("$skuu"); ?>',
         //sku: 'rayban_aviator_or_vertFlash',
          searchImageMask: 'https://appstatic.jeeliz.com/jeewidget/images/target.png',
          searchImageColor: 0x1abc9c,
          
          onError: function(errorLabel)
          { // this function catches errors, so you can display custom integrated messages
            alert('An error happened. errorLabel =' + errorLabel)
            switch(errorLabel) 
            {
              case 'NOFILE':
                // the user send an image, but it is not here
                break

              case 'WRONGFILEFORMAT':
                // the user upload a file which is not an image or corrupted
                break

              case 'INVALIDSKU':
                // the provided SKU does not match with a glasses model
                break

              case 'FALLBACKUNAVAILABLE':
                // we cannot switch to file upload mode. browser too old ?
                break

              case 'FATAL':
              default:
                // a bit error happens :(
                break
            } // end switch
          } // end onError()
        }) // end JEEWIDGET.start call
      } // end main()
    </script>

    <!-- A BIT OF STYLING... -->
    <link rel='stylesheet' href='css/JeeWidgetPublicGit.css' />
  </head>

  <body onload="main()">
    <header>
      <div class="headerTitle" style="margin-left: 750px; margin-top: 10px;">
        <a href="../index.php" style="text-decoration: none; "><h7 style="color: grey;">i</h7><h7 style="color: #1abc9c;">Specs</h7></a>
    </div>

      </div>
    </header>
    <main>
      <!-- BEGIN JEEWIDGET -->
      <div id='JeeWidget'>
        <!-- MAIN CANVAS : --><canvas id='JeeWidgetCanvas'></canvas>  <!--	A canvas is a rectangular area on an HTML page. By default, a canvas has no border and 																	   	no content.-->
        <!-- BEGIN UPLOAD PICTURE BUTTON -->
          <div class='JeeWidgetHiddenFileInput'>
             <input type='file' id='JeeWidgetFileInput' />
          </div>

        <!-- ADJUST BUTTON : -->
        <div class='JeeWidgetBottomButton' id='JeeWidgetAdjust'>
          <div class="buttonIcon"><i class="fas fa-arrows-alt"></i></div>Adjust the frame
        </div>
        <button id='buttonResizeCanvas' class='JeeWidgetBottomButton buttonResize' onclick='test_resizeCanvas();'><div class="buttonIcon"><i class="fas fa-sync-alt"></i></div>Resize canvas</button>



        <!-- BEGIN ADJUST NOTICE -->
        <div id='JeeWidgetAdjustNotice'>
          You can move the glasses!
          <button class='JeeWidgetBottomButton' id='JeeWidgetAdjustExit'>Quit</button>
        </div>
        <!-- END AJUST NOTICE -->

        <!-- BEGIN LOADING -->
        <div id='JeeWidgetLoading'>
           <div class='JeeWidgetLoadingWheel'>
              <svg viewBox='0 0 32 32' width='32' height='32'>
                <circle id='spinner' cx='16' cy='16' r='14' fill='none' />
              </svg>
            </div>
        </div>
        <!-- END LOADING -->
        <!-- BEGIN FALLBACK (upload picture) NOTICE -->
        <!--div id='JeeWidgetUploadNotice'>
          Please upload a picture to tryon your glasses
          <div class='JeeWidgetHiddenFileInput'>
             <input type='file' id='JeeWidgetFileInputNotice' />
          </div>
          <button id='JeeWidgetFileInputButtonNotice'>Choose image from file</button>
        </div-->
        <!-- END FALLBACK (upload picture) NOTICE -->



      </div>
      <!-- END JEEWIDGET -->    
    </main>
  </body>
</html>
 