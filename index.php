<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width,initial-scale=1.0" name="viewport" />

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">

<script src='//code.jquery.com/jquery-1.11.2.min.js'></script>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
    <link rel="stylesheet" href="/dist/L.Control.Locate.min.css" />
  <link rel="stylesheet" href="/src/prompt21.css" />


    <!--[if lt IE 9]>
      <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.ie.css" />
      <link rel="stylesheet" href="../dist/L.Control.Locate.ie.min.css"/>
      <![endif]-->
  </head>
  <body>
    <div id="map"></div>


 
    <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet-src.js"></script>
    <script src="/src/L.Control.Locate.js" ></script>


    <!--  THE MAIN SCRIPT  -->
    <script src="script.js"></script>
<!--  THE MAIN SCRIPT  -->







    <script src="../src/prompt21.js"></script>

<div class="popup" style="display: none;">
                            <form action="send-sms.php" class="form-horizontal"  method="post">
                                <fieldset>

                                <!-- Form Name -->
                                <legend>Group SMS</legend>

                                <!-- Text input-->
                                <div class="form-group">
                                  <label class="col-md-4 control-label" for="name.first"></label>
                                  <div class="col-md-6">
                                 
                                  <span id='groupID' class="help-block">Group name</span>
                                  </div>
                                </div>

                                <!-- Textarea -->
                                <div class="form-group">
                                  <label class="col-md-4 control-label" for="body">SMS content</label>
                                  <div class="col-md-6">
                                    <textarea class="form-control" id="story" name="body">Speant is here!!!</textarea>
                                  </div>
                                </div>

                                <!-- Button (Double) -->
                                <div class="form-group">
                                  <label class="col-md-4 control-label" for="cancel"></label>
                                  <div class="col-md-6">
                                  <input id="save" type="submit" class="btn btn-success submit">
                                    <button id="cancel" class="btn btn-default cancel">Cancel</button>
                                    
                                  </div>
                                </div>

                                </fieldset>
                            </form>
                        </div>
                        <script type="text/javascript">
                        $('#cancel').click(function(){
                          $('.popup').fadeOut();

                        });
                        </script>
    
  </body>
</html>
