
<html>

    <head>
        
        <title>jQuery</title>
 
        <script type="text/javascript" src="jquery.min.js"></script>
        
        <style type="text/css">
        
            body {
                
                font-family: sans-serif;
                padding:0;
                margin:0;
                
            }
            
            #header {
                
                width:100%;
                background-color: #EEEEEE;
                padding:5px;
                height: 30px;
                
            }
            
            #logo {
                
                float:left;
                font-weight: bold;
                font-size: 120%;
                padding: 3px 5px;
                
            }
            
            #buttonContainer {
                
                width:233px;
                margin: 0 auto;
                
            }
            
            .toggleButton {
                
                float:left;
                border: 1px solid grey;
                padding: 6px;
                border-right: none;
                font-size: 90%;
                
            }
        
            #html {
                
                border-top-left-radius: 4px;
                border-bottom-left-radius: 4px;
                
            }
            
            #output {
                
                border-top-right-radius: 4px;
                border-bottom-right-radius: 4px;
                border-right: 1px solid grey;
                
            }
            
            .active {
                
                background-color: #E8F2FF;
                
            }
            
            .highlightedButton {
                
                background-color: grey;
                
            }
            
            textarea {
                
                resize: none;
                border-top: none;
                border-color: grey;
                
            }
            
            .panel {
                
                float:left;
                width: 50%;
                border-left: none;
            }
            
            iframe {
                
                border:none;
                
            }
            
            .hidden {
                
                display: none;
                
            }
        
        </style>
        
    </head>

    <body>
        
        <div id="header">
        
            <div id="logo">
            
                CodePlayer
                
            </div>
            
            <div id="buttonContainer">
                
                <div class="toggleButton active" id="html">HTML</div>
                
                <div class="toggleButton" id="css">CSS</div>
                
                <div class="toggleButton" id="javascript">JavaScript</div>
                
                <div class="toggleButton active" id="output">Output</div>
            
            </div>
        
        </div>
        
        <div id="bodyContainer">
        
            <textarea id="htmlPanel" class="panel"><p id="paragraph">Hello World!</p></textarea>
            
            <textarea id="cssPanel" class="panel hidden">p { color: green; }</textarea>
            
            <textarea id="javascriptPanel" class="panel hidden">document.getElementById("paragraph").innerHTML = "Hello Rob!";</textarea>
            
            <iframe id="outputPanel" class="panel"></iframe>
        
        
        </div>
        
        <script type="text/javascript">
            
            function updateOutput() {
                
                $("iframe").contents().find("html").html("<html><head><style type='text/css'>" + $("#cssPanel").val() + "</style></head><body>" + $("#htmlPanel").val() + "</body></html>");
                
                document.getElementById("outputPanel").contentWindow.eval($("#javascriptPanel").val());
                
                
                
            }
            
            $(".toggleButton").hover(function() {
                
                $(this).addClass("highlightedButton");
                
            }, function() {
                
                $(this).removeClass("highlightedButton");
                
            });
            
            $(".toggleButton").click(function() {
                
                $(this).toggleClass("active");
                
                $(this).removeClass("highlightedButton");
                
                var panelId = $(this).attr("id") + "Panel";
                
                $("#" + panelId).toggleClass("hidden");
                
                var numberOfActivePanels = 4 - $('.hidden').length;
                
                $(".panel").width(($(window).width() / numberOfActivePanels) - 10);
                
            })
            
            $(".panel").height($(window).height() - $("#header").height() - 15);
            
            $(".panel").width(($(window).width() / 2) - 10);
            
            updateOutput();
            
            $("textarea").on('change keyup paste', function() {
    
                updateOutput();
                
                
            });
            
    

        </script>
        
    </body>

</html>