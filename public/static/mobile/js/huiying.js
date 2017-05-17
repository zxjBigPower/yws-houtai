$(function(){

            $(".huiying .biaoti").click(function(){



                  $(this).siblings(".huiying .jianju").toggle()

                     $(".huiying .biaoti").toggleClass("open");


                if($(".huiying .biaoti").hasClass("open")){
                    $(this).children(".huiying .biaoti i").html("∨")
                }else{
                     $(this).children(".huiying .biaoti i").html("^");

                }





            })















})