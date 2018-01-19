//&lt;![CDATA[
     jQuery(document).ready(function($) {
        jQuery("#bottom-testimonial-section .sow-testimonials").addClass("owl-carousel");
        var $rtl = false;
        var $foffset = 20;
           if (jQuery("html").attr("dir") == 'rtl'){
            $rtl = true;
            $foffset=-20;
           }else{$foffset=20;}
         jQuery("#bottom-testimonial-section .sow-testimonials").owlCarousel( {
            rtl: $rtl,
            items:1,
            pagination: true
         } );
        var checkRun = true;
        var checkWidths = $(window).width();
        
    function inViews(){
        if($('#home5-icons-our-section').length){
            var bottom_of_object = $('#home5-icons-our-section').offset().top;
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if((bottom_of_window > bottom_of_object) && (checkWidths > 767)){
                return true;
            }
        }
    };
    if(checkWidths < 768){
        var doughnutData = [
            {value:95,color:"#e92890"},
            {value:100-95,color:"rgba(0,0,0,0)"}
        ];
        
        $("#myDoughnut").doughnutit({
            dnData: doughnutData,
            dnSize: 187, 
            dnInnerCutout: 90,
            dnAnimation: true,
            dnAnimationSteps: 60,
            dnAnimationEasing: 'linear',
            dnStroke: false,
            dnShowText: true,
            dnFontSize: '30px',
            dnFontColor: "#e92890",
            dnText: '95%', 
            dnFontOffset: $foffset ,
            dnStartAngle: 90,
            dnCounterClockwise: false, 
        });// End Doughnut
        var doughnutData = [
            {value:90,color:"#fbc443"},
            {value:100-90,color:"rgba(0,0,0,0)"}
        ];
        $( "#myDoughnut2" ).doughnutit({
            dnData: doughnutData,
            dnSize: 187,
            dnInnerCutout: 90,
            dnAnimation: true,
            dnAnimationSteps: 60,
            dnAnimationEasing: 'linear',
            dnStroke: false,
            dnShowText: true,
            dnFontOffset:$foffset,
            dnFontSize: '30px',
            dnFontColor: "#fbc443",
            dnText: '90%',
            dnStartAngle: 90,
            dnCounterClockwise: false,
        });// End Doughnut
        var doughnutData = [
            {value:85,color:"#25bce9"},
            {value:100-85,color:"rgba(0,0,0,0)"}
        ];
        $( "#myDoughnut3" ).doughnutit({
            dnData: doughnutData,
            dnSize: 187,
            dnInnerCutout: 90,
            dnAnimation: true,
            dnAnimationSteps: 60,
            dnAnimationEasing: 'linear',
            dnStroke: false,
            dnFontOffset:$foffset,
            dnShowText: true,
            dnFontSize: '30px',
            dnFontColor: "#25bce9",
            dnText: '85%',
            dnStartAngle: 90,
            dnCounterClockwise: false,
        });
        var doughnutData = [
            {value:80,color:"#94eae3"},
            {value:100-80,color:"rgba(0,0,0,0)"}
        ];
        $( "#myDoughnut4" ).doughnutit({
            dnData: doughnutData,
            dnSize: 187,
            dnInnerCutout: 90,
            dnAnimation: true,
            dnAnimationSteps: 60,
            dnFontOffset:$foffset,
            dnAnimationEasing: 'linear',
            dnStroke: false,
            dnShowText: true,
            dnFontSize: '30px',
            dnFontColor: "#94eae3",
            dnText: '80%',
            dnStartAngle: 90,
            dnCounterClockwise: false,
        });
            
    }
    function inView(){  
        var b = inViews();
        if(b == true && checkRun == true){
            checkRun = false;
            var doughnutData = [
                {value:95,color:"#fd5b4e"},
                {value:100-95,color:"rgba(0,0,0,0)"}
            ];
            $("#myDoughnut" ).doughnutit({
                dnData: doughnutData,
                dnSize: 187, 
                dnInnerCutout: 90,
                dnAnimation: true,
                dnAnimationSteps: 60,
                dnAnimationEasing: 'linear',
                dnStroke: false,
                dnShowText: true,
                dnFontSize: '24px',
                dnFontColor: "#fd5b4e",
                dnText: '95%', 
                dnFontOffset: $foffset,
                dnStartAngle: 90,
                dnCounterClockwise: false, 
            });// End Doughnut
            var doughnutData = [
                {value:90,color:"#ffa63e"},
                {value:100-90,color:"rgba(0,0,0,0)"}
            ];
            $( "#myDoughnut2" ).doughnutit({
                dnData: doughnutData,
                dnSize: 187,
                dnInnerCutout: 90,
                dnAnimation: true,
                dnAnimationSteps: 60,
                dnAnimationEasing: 'linear',
                dnStroke: false,
                dnShowText: true,
                dnFontOffset:$foffset,
                dnFontSize: '24px',
                dnFontColor: "#ffa63e",
                dnText: '90%',
                dnStartAngle: 90,
                dnCounterClockwise: false,
            });// End Doughnut
            var doughnutData = [
                {value:85,color:"#25bce9"},
                {value:100-85,color:"rgba(0,0,0,0)"}
            ];
            $( "#myDoughnut3" ).doughnutit({
                dnData: doughnutData,
                dnSize: 187,
                dnInnerCutout: 90,
                dnAnimation: true,
                dnAnimationSteps: 60,
                dnAnimationEasing: 'linear',
                dnStroke: false,
                dnFontOffset:$foffset,
                dnShowText: true,
                dnFontSize: '24px',
                dnFontColor: "#25bce9",
                dnText: '85%',
                dnStartAngle: 90,
                dnCounterClockwise: false,
            });
            var doughnutData = [
                {value:80,color:"#5cc99f"},
                {value:100-80,color:"rgba(0,0,0,0)"}
            ];
            $( "#myDoughnut4" ).doughnutit({
                dnData: doughnutData,
                dnSize: 187,
                dnInnerCutout: 90,
                dnAnimation: true,
                dnAnimationSteps: 60,
                dnFontOffset:$foffset,
                dnAnimationEasing: 'linear',
                dnStroke: false,
                dnShowText: true,
                dnFontSize: '24px',
                dnFontColor: "#5cc99f",
                dnText: '80%',
                dnStartAngle: 90,
                dnCounterClockwise: false,
            });
            b = false;  
        }
    }; 
    $(window).on('scroll', function() {  
       inView();
    });
});
//]]&gt;