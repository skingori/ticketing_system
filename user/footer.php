</div>
</div>
</div>
</div>
</div>
</div>
<!-- /page content -->

<!-- footer content -->
<footer>
    <div class="pull-right">
        Online ticketing System <a href="https://github.com/skingori">tarclink</a>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

<script src="../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>
<!-- jQuery Smart Wizard -->
<script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>

<!-- My test scripts -->
<script>
    function printData()
    {
        var divToPrint=document.getElementById("table1");
        newWin= window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    }

</script>
<script>

    function validate() {
        var output = true;

        return output;
    }
    $(document).ready(function() {
        $("#next").click(function(){
            var output = validate();
            if(output) {
                var current = $(".highlight");
                var next = $(".highlight").next("li");
                if(next.length>0) {
                    $("#"+current.attr("id")+"-field").hide();
                    $("#"+next.attr("id")+"-field").show();
                    $("#back").show();
                    $("#finish").hide();
                    $("#terms").hide();
                    $(".highlight").removeClass("highlight");
                    next.addClass("highlight");
                    if($(".highlight").attr("id") == $("li").last().attr("id")) {
                        $("#next").hide();
                        $("#finish").show();
                        $("#terms").show();
                    }
                }
            }
        });
        $("#back").click(function(){
            var current = $(".highlight");
            var prev = $(".highlight").prev("li");
            if(prev.length>0) {
                $("#"+current.attr("id")+"-field").hide();
                $("#"+prev.attr("id")+"-field").show();
                $("#next").show();
                $("#finish").hide();
                $("#terms").hide();
                $(".highlight").removeClass("highlight");
                prev.addClass("highlight");
                if($(".highlight").attr("id") == $("li").first().attr("id")) {
                    $("#back").hide();
                }
            }
        });
    });
</script>



</body>
</html>
