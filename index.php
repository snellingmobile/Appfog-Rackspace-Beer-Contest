<?php
/* Source by Sam Snelling (@snellingmobile) and licensed under the MIT License. All photo's and copyrights belong to their respective companys. */
/* CHANGE THESE VALUES */
$developerID = 'samsnelling1234567890'; // Your Appfog developer ID
$googleAnalytics = "UA-38166115-1"; // If you want to track the website via Google Analytics!
/* NO MORE CHANING! */
?>


<?php
  $submitted = false;
  if(isset($_GET['beer'])){
    $beer = $_GET['beer'];
    if($beer == 1 || $beer == 2 || $beer == 3 || $beer == 4 || $beer == 5 || $beer == 6){
      $user = $developerID . '-' . mt_rand(5, 25);
      $data = array("developer" => $developerID, "user" => $user, "beer" => $beer);                                                                    
      $data_string = json_encode($data);           
      if(!isset($_COOKIE[$developerID])){
        $ch = curl_init('http://appsworld.raxdrg.com/api/');                                                                      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($data_string))                                                                       
        );                                                                                                           
         
        $result = curl_exec($ch);
        $info = curl_getinfo($ch); 
      }
      $submitted = true;
      setcookie ($developerID, "Voted!");
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php if(!$submitted){  echo "What beer is your favorite?"; }else{ echo "Thanks!"; }  ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Le styles -->
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap.no-icons.min.css" rel="stylesheet">
    <style type="text/css">
      .span4{padding-bottom: 20px}
      body{text-align:center;}
      a img {
        filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0\'/></filter></svg>#grayscale"); /* Firefox 3.5+ */
        filter: gray; /* IE6-9 */
        -webkit-filter: grayscale(100%); /* Chrome 19+ & Safari 6+ */
      }

      a img:hover {
        filter: none;
        -webkit-filter: grayscale(0%);
      }
    </style>

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

  <body data-spy="scroll" data-target=".bs-docs-sidebar" style="padding-top:0">


    <div class="container">
      <div class="span12">
        <h3>Rackspace/AppFog Happy Hour</h3>
        <?php
          if($submitted){
            if(isset($info['http_code']) && $info['http_code'] === 204){
              echo "<h1>Thanks for your vote!</h1>";
            }else 
            if($_COOKIE[$developerID]){
              echo "<h1>Looks like you've already voted! Thanks!</h1>";
            }else {
              echo "<h1>Looks like something went wrong! Yikes!</h1>";
            }
          }else{
            echo "<h1>What beer would you rather have?</h1>";
          }
        ?>
      </div>
      <div class="span12">
        <?php if(!$submitted){ ?>
        <div class="row">
          <article class="span4">
            <a id="guinness" href="index.php?beer=1" data-content="Labatt's brew a pale ale base to which is added the unfermented but hopped Guinness wort extract. Guinness Extra Stout is brewed in Canada by Labatt under license from Arthur Guinness Son & Company." rel="popover" data-placement="bottom" data-original-title="Vote for Guinness Stout" data-trigger="hover">
              <img src="img/guinness.jpg"></br>
              Vote for Guinness Stout
            </a>
          </article>
          <article class="span4">
            <a id="hefeweizen" href="index.php?beer=2" data-content="A golden unfiltered wheat beer that is truly cloudy and clearly superb." rel="popover" data-placement="bottom" data-original-title="Vote for Widmer Hefeweizen" data-trigger="hover">
              <img src="img/hefeweizen.jpg"><br/>
              Vote for Widmer Hefeweizen
            </a>
          </article>
          <article class="span4">
            <a id="lagunitas" href="index.php?beer=3" data-content="The recipe was formulated originally as a seasonal beer in 1995. With malt and hops working together to balance it all out on your ‘buds so you can knock back more than one without wearing yourself out. Big on the aroma with a hoppy-sweet finish that’ll leave you wantin’ another sip." rel="popover" data-placement="bottom" data-original-title="Vote for Lagunitas IPA" data-trigger="hover">
              <img src="img/lagunitas.jpg"><br/>
              Vote for Lagunitas IPA
            </a>
          </article>
        </div>
        <div class="row">
          <article class="span4">
            <a id="newcastle" href="index.php?beer=4" data-content="Newcastle Brown Ale was first brewed in 1927 in Newcastle-upon-Tyne, England, by Jim Porter after three years of development. Production moved from Newcastle to Gateshead at the end of 2004 and to Tadcaster on closure of the Dunston brewery in 2010. " rel="popover" data-placement="top" data-original-title="Vote for Newcastle Brown Ale" data-trigger="hover">
              Vote for Newcastle Brown Ale<br/>
              <img src="img/newcastle.jpg">
            </a>
          </article>
          <article class="span4">
            <a id="sierranevada" href="index.php?beer=5" data-content="Sierra Nevada Pale Ale is a delightful example of the classic pale ale style. It has a deep amber color and a exceptionally full-bodied, complex character. The fragrant bouquet and spicy flavor are the results of the generous use of the best Cascade hops." rel="popover" data-placement="top" data-original-title="Vote for Sierra Nevada Pale Ale">
              Vote for Sierra Nevada Pale Ale<br/>
              <img src="img/sierranevada.jpg">
            </a>
          </article>
          <article class="span4">
            <a id="stella" href="index.php?beer=6" data-content="Stella Artois is one of the world’s best-selling beers and is enjoyed in more than 80 countries. Its full, characteristic flavour and high quality is assured through a superior brewing process and by using the finest ingredients available." rel="popover" data-placement="top" data-original-title="Vote for Stella Artois">
              Vote for Stella Artois<br/>
              <img src="img/stella.jpg">
            </a>
          </article>
        </div>
      </div>
    </div>


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $('#guinness').popover({ trigger: "hover" });
      $('#hefeweizen').popover({ trigger: "hover" });
      $('#lagunitas').popover({ trigger: "hover" });
      $('#newcastle').popover({ trigger: "hover" });
      $('#sierranevada').popover({ trigger: "hover" });
      $('#stella').popover({ trigger: "hover" });
    </script>

    <?php } ?>

    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', '<?php echo $googleAnalytics; ?>']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>
  </body>
</html>