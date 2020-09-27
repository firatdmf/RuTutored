
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">










<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<!-- $Id: header.jsp,v 1.3 2017/02/16 14:16:32 ad764 Exp $ -->
		<title>Rutgers  Central  Authentication  Service (CAS)</title>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<meta name="keywords" content="Central Authentication Service,JA-SIG,CAS,Rutgers University" />
		<meta name="description" content="The Rutgers login page for the JA-SIG Central Authentication Service" />
		<meta name="author" content="Bart Grebowiec, Scott Battaglia, Dave Steiner" />
		
		<meta name="viewport" content="width=device-width" />
    	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
		
		<style type="text/css">
        /* reset margins and padding for all elements since defaults are not crossbrowser */
        * {margin:0; padding:0;}

        /* browser default font-size is 16px which is too big so we make it 16px x 62.5% = 10px */
        body {font:normal 62.5%/1 Arial,Helvetica,Verdana,sans-serif;}

        /* global */
        a img, #header img {border:0; display:block;}
        a:hover {color:#b00;}

        /* HEADER
        --------------------------------- */
        #header p {padding:0 0 2px 3px; background:#b00; color:#fff; font-size:1.2em; line-height:1.6;}
        #header h1 {clear:both; padding:0 0 0 15px; background:#b00 url(images/bg_header.gif); color:#fff; font:2.4em/2em Arial,Helvetica,sans-serif;}
        h1#app-name {-moz-background-clip:border; -moz-background-inline-policy:continuous; -moz-background-origin:padding; -x-system-font:none; background:#D21033 url(images/RU_banner.jpg) no-repeat scroll 0 0; color:#FEFAFB; font-family:Georgia,"Times New Roman",serif; font-size:18px; font-size-adjust:none; font-stretch:normal; font-style:normal; font-variant:normal; font-weight:400; letter-spacing:0; line-height:0; margin:0; min-height:25px; padding:26px 0 1px 185px; *height:25px; *line-height:1.0; *padding: 18px 0 9px 185px; }
 
        /* CONTENT
        --------------------------------- */
        #content {clear:both; width:auto; padding:1px 0; margin:0 5% 2em;}
        #content .dataset {clear:both; border:#eee 1px solid; padding:10px; margin:30px 0 0; font-size:1.1em; line-height:1.6em;}
        #content .dataset h2 {border:#ccc 1px solid; padding:0 5px; font-weight:bold; font-size:1.2em; line-height:1.5em; width:350px; position:relative; left:-20px; top:-20px; background-color:#eee; color:#066;}
        #content .dataset p.info-msg {margin:0 1em 1em; border:1px solid #ccc; background-color:#ffc; color:#000; padding:10px;}
        #content .dataset p.txt {margin:0 1em 1em;}

        /* FOOTER
        --------------------------------- */
        #footer {clear:both; margin:2em 5% 10px;}
        #footer hr {background:#ccc; color:#ccc; height:1px; border:0;}
        #footer img {float:right; margin-top: 10px;}
        #footer p {margin:1em 0 0; padding:0; font-size:1.1em; color:#999; line-height:1.2em;}
        #footer br {display:block;}

        table {margin:1em auto; border:0; border-collapse:collapse; empty-cells:show;}
        th {padding:10px 2px 0 0; text-align:right;}
        td {padding:10px 0 0 2px;}

        fieldset {border:#ccc 1px solid; margin:1em; padding:2em 1em;}
        legend {color:#066; font-size:1.2em; padding-left:5px;}
        label {font-weight:bold; font-size:1.1em; margin:0 5px 0 5px; cursor:pointer;}

        input,select,textarea {font-family:Verdana,Helvetica,sans-serif; font-size:11px; padding:1px 2px;}
        .accesskey {text-decoration:underline;}
        .required {background:#ffc;}
        .important {font-weight:bold; font-size:1.2em; color:#b00;}

        .errors {clear:both; margin:1em; border:#b00 1px dotted; padding:1em; font-weight:bold; background:#ffe; color:#b00;}
        .errors ul {list-style-type:none;}

        #authenticationType {width:9em;}

        /* MESSAGES
        --------------------------------- */
        /* dynamic messages */
        .info {clear:both; margin:18px 1em 1em; padding:9px 18px; font-size:10px; line-height:1.5;  -moz-border-radius:10px; -webkit-border-radius:10px;}
        .info {background:#eff; color:#008; border:1px solid #e8f9f9;}
        .info h2 {position:relative; margin:0; padding:0; font:400 18px Georgia,"Times New Roman",Times,serif;}
        .info h3 {margin-top:18px; line-height:1.0;}
        .info h2, .info h3 {color:#008;}
        .info h2 img {position:absolute; left:-26px; top:2px;}
        .info p {margin:0; padding:0;}
        .info p+p, .info h3+p {margin:0 0 18px 0;}
        .info ul {margin:1em 0 0; padding:0; list-style-position:inside;}

        /* static messages */
        p.info {padding:0 0 0 2em; font-size:1.1em; border:0; background:#eff url(images/info-s.gif) no-repeat 0 0; font-weight:400; color:#000; line-height:1.5;}

        /* NEW STYLES FOR MOBILE
        --------------------------------- */
        div.row {margin:10px 0 10px 18%;}
        .row strong {margin-left:25px;}
        .row label {line-height:1.8;}
        br {display:none;}
        label {float:left; width:10em; text-align:right;}
        .alt {padding-left:12em;}
        .alt label {float:none;}


        /*
            all and (max-width:480px) 767px
            handheld, only screen and (max-device-width:480px)
        */
        @media screen and (max-device-width:480px) {
            * {float:none !important;}
            body {font-size:100% !important;}
            div.row {margin:10px 15px 10px 0;}
            .alt {padding:0;}
            .row strong {margin:0; font-size:.8em; line-height:1; display:block; padding:.25em 0 0; color:#555;}
            h2, p.txt, #header p {display:none;}
            #header h1 {font-size:15px; font-weight:900;}
            h1#app-name {text-align:center; min-height:inherit; padding:0; background:#d21034; color:#fff; line-height:2em;}
            fieldset {border:0;margin:0;padding:0;}
            label {margin:0; float:none; width:auto;}
            div.alt {margin-top:1em;}
            .alt label {float:none; width:auto;line-height:1}
            .alt input {margin:0;}
            #content .dataset {border:0; clear:both; margin:-1em 0 1em; padding:0;}

            input[type="password"], input[type="text"] {width:100%; font-size:1.2em;}
            input[type="submit"] {font-size:1.0em;}

            input[type="checkbox"] {margin:0 5px 0 0; padding:0; Xvertical-align:bottom;}
            legend {margin:0; padding:0 0 1em 0;}
            legend strong {font-size:1em; display:none;}
            strong {font-weight:400;}
            br {display:block;}
            .accesskey {text-decoration:none;}
            #footer {display:none;}
            #footer img {display:block; float:none;}
            select {font-size:1.0em;}
            form {padding-top:0; margin-top:0;}

            #header h1 {margin-bottom:0;}
            #content .dataset p.info-msg {margin:2em 0 0; border:0; padding:0; background:transparent;} 
        }



		</style>

		<script type="text/javascript">


			window.onload = function (){
                if(document.getElementById("username")) {
                    var username = document.getElementById("username");
					 username.focus(); username.select();
                }
            }
	    </script> 
	</head>


<script type="text/javascript">
    function prepareSubmit() {
        // Extract the fragment from the browser's current location.
        var hash = decodeURIComponent(document.location.hash);

        // The fragment value may not contain a leading # symbol
        if (hash && hash.indexOf("#") === -1) {
            hash = "#" + hash;
        }

        // Append the fragment to the current action so that it persists to the redirected URL.
        document.getElementById("fm1").action = document.getElementById("fm1").action + hash;
        return true;
    }
</script>

<body onload="prepareSubmit();">
	<!-- HEADER -->
    <!-- $Id: banner.jsp,v 1.1.1.1 2015/03/17 14:35:34 ad764 Exp $ -->
	<h1 id="app-name">Central Authentication Service (CAS)</h1>
	<!-- END HEADER -->


<!-- CONTENT -->
<div id="content">

    <div class="dataset clear">
        <h2>Please Log In</h2>

        <p class="txt intro">
            
            You have requested access to a site that requires Rutgers authentication.
            
            This is not a public network and explicit authorization is required.
            For security reasons, please Log Out and Exit your web browser when you are done accessing services that
            require authentication!
        </p>


        <form id="fm1" class="fm-v clearfix" action="/login?service=https%3A%2F%2Fidps.rutgers.edu%2Fidp%2FAuthn%2FExtCas%3Fconversation%3De1s2&amp;entityId=http%3A%2F%2Frutgers.instructure.com%2Fsaml2" method="post">
            
            <fieldset>
                <legend><strong>Enter your Rutgers NetID and Password</strong></legend>
                <div class="row">
                    <label for="username"><span class="accesskey">N</span>etID:</label>
                    

                    
                        <input id="username" name="username" class="required" tabindex="1" accesskey="n" type="text" value="" size="32" autocomplete="off"/>
                    
                </div>
                <div class="row">
                    <label for="password"><span class="accesskey">P</span>assword:</label>
                    

                    <input id="password" name="password" class="required" tabindex="2" accesskey="p" type="password" value="" size="32" autocomplete="off"/>
                    <strong>Ensure proper security &mdash; keep your password a secret</strong>
                </div>

             <!--   <div class="row">
                    <label for="authenticationType"><span class="accesskey">A</span>uthentication Type:</label>
                    <br/>
                    <select id="authenticationType" name="authenticationType">
                        <option value="Kerberos">Default</option>
                        <option value="SafeWord">SafeWord</option>
                    </select>
                </div>-->
                <div class="row alt">
                    <input id="warn" name="warn" value="true" tabindex="3" accesskey="n" type="checkbox"
                           style="padding:0; margin:0;"/>
                    <label for="warn" class="other"><span class="accesskey">N</span>otify me before logging me into
                        other sites.</label>
                </div>
                <div class="row alt">
                    <font style="color:#d21033;">To protect your privacy, please logout and exit your browser when you
                        are done accessing services that require authentication</font>
                </div>
                <div class="row alt">
					
					<input type="hidden" name="authenticationType" value="Kerberos"/>
                    <input type="hidden" name="lt" value="LT-310134-WxIvFsCxIqI0uiummJ7buBgCoeuPgy"/>
                    <input type="hidden" name="execution" value="e2s1"/>
                    <input type="hidden" name="_eventId" value="submit"/>

                    <input class="btn-submit" name="submit" accesskey="l" value="LOGIN" tabindex="4" type="submit"/>
                    &nbsp;&nbsp;&nbsp;&nbsp;Forgotten <a href="https://netid.rutgers.edu/displayNetIdLookupForm.htm">NetID</a>
                    or <a href="https://netid.rutgers.edu/displayForgottenPasswordForm.htm">password</a>? &nbsp;&nbsp;First-time
                    users, <a href="https://netid.rutgers.edu/index.htm">activate your NetID</a>.
                </div>
            </fieldset>
        </form>

    </div>
</div>
<!-- END CONTENT -->

	<!-- FOOTER -->
    <!-- $Id: footer.jsp,v 1.4 2019/04/12 14:41:56 ad764 Exp $ -->
   	<div id="footer">
		<hr />
		<img src="images/RU_SIG_ST_web.gif" width="123" height="44" alt="" />
		<p>
			Links to campus web sites: 
			  <a href="http://www.camden.rutgers.edu/" target="_blank">Camden</a>, 
			  <a href="http://www.newark.rutgers.edu/" target="_blank">Newark</a>, 
			  <a href="http://nbp.rutgers.edu/" target="_blank">New Brunswick/Piscataway</a>, 
			  <a href="http://www.rutgers.edu/" target="_blank">Rutgers University</a>.
			<br />For assistance, contact the Help Desks in: 
			  <a href="https://it.camden.rutgers.edu" target="_blank">Camden</a>,
			  <a href="https://runit.rutgers.edu/hd" target="_blank">Newark</a>,
			  or <a href="http://www.nbcs.rutgers.edu/helpdesk/" target="_blank">New Brunswick/Piscataway</a>.
		</p>
	</div>
	<!-- END FOOTER -->



</body>
<script type="text/javascript">
    if(document.getElementById("username")) {
        var username = document.getElementById("username");
        username.focus(); username.select();
    }
</script>
</html>