        var i=0;
        var ii =0;
        var a=10;
        var aa=10;

        var elem = document.getElementById('Eingabe');
        elem.addEventListener('click', generateTextBox);
        var elem1 = document.getElementById('Eingabe1');
        elem1.addEventListener('click', generateTextBox);

         function generateTextBox(){
            var identity;
            var schulfach;
            var idnumber;
            if (calculate() === 'Eingabe') {
                identity = '#Eingabe';
                idnumber = i;
                ii = i;
                i++;
                schulfach = '#schulfach';
            
            }else if (calculate() === 'Eingabe1') {
                identity = '#Eingabe1';
                idnumber = a;
                aa=a;
                a++;
                schulfach = '#modulfach';
            };

            var $mainDiv= $(schulfach);
            var $div= $('<div></div>').attr('id','field'+idnumber);

            var $newBreak= $('<br>');
            var $newButton= $('<button>+</button>');
            var $newTextBox= $('<input type="text"></input>').css('margin-right', '15px');
             
            $newButton.attr('id','btn'+idnumber).css('marginRight', '15px');
            $newTextBox.attr('id','txtAddr'+idnumber);
            $div.append($newButton);
            $div.append($newTextBox);
            $mainDiv.append($div);
            $mainDiv.append($newBreak);

            $('#btn'+idnumber).click(function(){
                rightBox();
            });
    
            
            if (i===10) {
                elem.disabled = true;
            }
            if (a===20) {
                elem1.disabled = true;
            };
        }   
        zaehlerarr = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];

      function rightBox(){
        console.log(document);
         var $newTextBox= $('<input type="text"></input>').css({
                            'width': '30px',
                            'margin-right': '5px'
                            });
         var numx;

        for (var x = 0; x < a; x++) {
            if (zaehlerarr[x]===19) {
                $('#btn'+x).prop('disabled', true);
           };
            if('btn'+x === calculate()){
                zaehlerarr[x] +=1;
                $newTextBox.attr('id', calculate()+ '-right'+zaehlerarr[x]);
                $('#field'+x).append($newTextBox);
                break;
            };

        };

    }

    function calculate(){
        var e = window.event,
        btn = e.target || e.srcElement;
        return btn.id;
}

var acc = $(".accordion");
var y;

for (y = 0; y < acc.length; y++) {
    acc[y].onclick = function(){
        this.classList.toggle("active");
        this.nextElementSibling.classList.toggle("show");
    }
}