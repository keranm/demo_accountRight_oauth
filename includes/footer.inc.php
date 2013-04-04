      <!-- begin footer -->
      <hr />

      <div class="footer">
        <p>&copy; MYOB Technology Ltd 2013
        <span class="muted pull-right"><?php // page timer
        // now render the page
          $endtime = microtime();
          $endarray = explode(" ", $endtime);
          $endtime = $endarray[1] + $endarray[0];
          $totaltime = $endtime - $starttime;
          $totaltime = round($totaltime,10);


          $API_totaltime = $API_endtime - $API_starttime;
          $API_totaltime = round($API_totaltime,10);

          echo "This page took: ";
          printf ("%f\n", $totaltime);
          echo " seconds to load";

          echo "<br />The API call took: ";

          printf ("%f\n", $API_totaltime);
          echo " seconds" 

        ?></span></p>
      </div>

    </div> <!-- /container -->

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-39859933-1']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>
  </body>
</html>