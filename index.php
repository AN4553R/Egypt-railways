<html>
<head>
    <meta charset="UTF-8">
    <title>Egypt Trinas - قطارات مصر</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <script>
        function autocomplete(inp, arr) {

            var currentFocus;

            inp.addEventListener("input", function(e) {
                var a, b, i, val = this.value;
                closeAllLists();
                if (!val) { return false;}
                currentFocus = -1;

                /*create a DIV element that will contain the items (values):*/

                a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");

                /*append the DIV element as a child of the autocomplete container:*/

                this.parentNode.appendChild(a);

                /*for each item in the array...*/

                for (i = 0; i < arr.length; i++) {

                    /*check if the item starts with the same letters as the text field value:*/
                    if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {

                        /*create a DIV element for each matching element:*/
                        b = document.createElement("DIV");

                        /*make the matching letters bold:*/
                        b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                        b.innerHTML += arr[i].substr(val.length);

                        /*insert a input field that will hold the current array item's value:*/
                        b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";

                        /*execute a function when someone clicks on the item value (DIV element):*/
                        b.addEventListener("click", function(e) {

                            /*insert the value for the autocomplete text field:*/
                            inp.value = this.getElementsByTagName("input")[0].value;

                            /*close the list of autocompleted values,
                            (or any other open lists of autocompleted values:*/
                            closeAllLists();
                        });
                        a.appendChild(b);
                    }
                }
            });
            /*execute a function presses a key on the keyboard:*/
            inp.addEventListener("keydown", function(e) {
                var x = document.getElementById(this.id + "autocomplete-list");
                if (x) x = x.getElementsByTagName("div");
                if (e.keyCode == 40) {
                    /*If the arrow DOWN key is pressed,
                    increase the currentFocus variable:*/
                    currentFocus++;
                    /*and and make the current item more visible:*/
                    addActive(x);
                } else if (e.keyCode == 38) { //up
                    /*If the arrow UP key is pressed,
                    decrease the currentFocus variable:*/
                    currentFocus--;
                    /*and and make the current item more visible:*/
                    addActive(x);
                } else if (e.keyCode == 13) {
                    /*If the ENTER key is pressed, prevent the form from being submitted,*/
                    e.preventDefault();
                    if (currentFocus > -1) {
                        /*and simulate a click on the "active" item:*/
                        if (x) x[currentFocus].click();
                    }
                }
            });
            function addActive(x) {
                /*a function to classify an item as "active":*/
                if (!x) return false;
                /*start by removing the "active" class on all items:*/
                removeActive(x);
                if (currentFocus >= x.length) currentFocus = 0;
                if (currentFocus < 0) currentFocus = (x.length - 1);
                /*add class "autocomplete-active":*/
                x[currentFocus].classList.add("autocomplete-active");
            }
            function removeActive(x) {
                /*a function to remove the "active" class from all autocomplete items:*/
                for (var i = 0; i < x.length; i++) {
                    x[i].classList.remove("autocomplete-active");
                }
            }
            function closeAllLists(elmnt) {
                /*close all autocomplete lists in the document,
                except the one passed as an argument:*/
                var x = document.getElementsByClassName("autocomplete-items");
                for (var i = 0; i < x.length; i++) {
                    if (elmnt != x[i] && elmnt != inp) {
                        x[i].parentNode.removeChild(x[i]);
                    }
                }
            }
            /*execute a function when someone clicks in the document:*/
            document.addEventListener("click", function (e) {
                closeAllLists(e.target);
            });
        }

        var stations=[
            'الاسكندرية','الاسماعيلية','اسوان','اسيوط','الاقصر','البحر الاحمر','البحيرة','بني سويف','بورسعيد',
            'جنوب سيناء','الجيزة','الدقهلية','دمياط','سوهاج','السويس','الشرقية','شمال سيناء','الغربية',
            'الفيوم','القاهرة','القليوبية','قنا','كفر الشيخ','مطروح','المنوفية','المنيا','الوادي الجديد'
        ];
    </script>

</head>
<body>
    <div class="header">
        <div style="float: left;margin-top: 0.8%;">
            <div class="menue"></div>
            <div class="menue"></div>
            <div class="menue"></div>
        </div>
        <h3 style="margin-left: 5%;">Egypt Trinas - قطارات مصر</h3>
    </div>

    <div class="body" dir="rtl">

        <form autocomplete="off" action="result.php" dir="rtl" method="get">
            <div class="autocomplete" style="width:300px;margin-top: 15%">
                <input id="From" name="From" type="text"  placeholder="محطة المغادرة ..." style="width: 450px;height: 60px;font-size:x-large;background: white">

                <script> autocomplete(document.getElementById("From"), stations);</script>
            </div>
            <div class="autocomplete" style="width:300px;margin-top: 5%">
                <input id="To" name="To" type="text"  placeholder="محطة الوصول ..." style="width: 450px;height: 60px; font-size: x-large;background: white">

                <script> autocomplete(document.getElementById("To"), stations);</script>
            </div>
            <br clear="both">
            <select id="test-dropdown" style="margin-right: 35%;margin-top: 5%; width: 450px;height: 60px; font-size: x-large">
                <option value="1">VIP</option>
                <option value="2">مكيف</option>
                <option value="3">نوم</option>
                <option value="4">ركاب</option>
            </select>
            <br clear="both">
            <input type="submit" name="submit" value="عرض القطارات" style="margin-top: 2%;margin-right: 40%;width: 300px;font-size: x-large">
        </form>

    </div>


</body>
</html>
