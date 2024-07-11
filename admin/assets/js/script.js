// $(function () {
//     const active = document.querySelectorAll('.inactive');

//     active.forEach(item => {
//         item.addEventListener('click', () => {
//             document.querySelector('.active')?.classList.remove('active');
//             item.classList.add('active');
//         });
//     });
// });

  $(function() {  
    $("#activeBtn").click(function() {
        document.getElementById('mobilesidebar').style.display = 'flex';
    })

    $("#closeBtn").click(function() {
      document.getElementById('mobilesidebar').style.display = 'none';
  })

    $("#btcBtn").click(function() {
        document.getElementById('btc').style.display = 'block';
        document.getElementById('cards').style.display = 'none';
        document.getElementById('biller').style.display = 'none';

        document.getElementById('btcBtn').classList.add('active');
        document.getElementById('cardsBtn').classList.remove('active');
        document.getElementById('billBtn').classList.remove('active');
    })

    $("#cardsBtn").click(function() {
        document.getElementById('btc').style.display = 'none';
        document.getElementById('cards').style.display = 'block';
        document.getElementById('biller').style.display = 'none';

        document.getElementById('btcBtn').classList.remove('active');
        document.getElementById('cardsBtn').classList.add('active');
        document.getElementById('billBtn').classList.remove('active');
    })

    $("#billBtn").click(function() {
        document.getElementById('btc').style.display = 'none';
        document.getElementById('cards').style.display = 'none';
        document.getElementById('biller').style.display = 'block';

        document.getElementById('btcBtn').classList.remove('active');
        document.getElementById('cardsBtn').classList.remove('active');
        document.getElementById('billBtn').classList.add('active');
    })

    $('.theInput').attr('disabled', 'disabled')

    $("#makeChanges").click(function() {
        $(".theInput").prop('disabled', false);
        document.getElementById('saveBtn').style.display = 'block';
        document.getElementById('makeChanges').style.display = 'none';
    })

    // setTimeout(function(){
    //     document.getElementById('fade').classList.add('hidden');
    // },4000);

    function delay() {
        window.onload = function() {
          setTimeout(function() {
            document.getElementById("fade").style.display = "block";
          }, 1000);
        }
      }
      
    delay();
});

function yesnoCheck() {
  if (that.value == "with") 
  {
      alert("check");
      document.getElementById("ifYes").style.display = "block";
  } 
  else 
  {
      document.getElementById("ifYes").style.display = "none";
  }
}