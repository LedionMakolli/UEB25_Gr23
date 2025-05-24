   // per pricing (popup)
  $(document).ready(function() {
            const prices = {
                monthly: ['0€', '29€', '199€', '299€'],
                yearly: ['0€', '299€', '1999€', '2999€']
            };

            let selectedPlanType = 'yearly'; // default


            $('.pricing-plan').each(function(index) {
                $(this).find('.price').html(`${prices[selectedPlanType][index]} <span>${prices[selectedPlanType === 'monthly' ? 'yearly' : 'monthly'][index]}</span>`);
            });

            $('.toggle-buttons button').on('click', function() {
                $('.toggle-buttons button').removeClass('active');
                $(this).addClass('active');

                selectedPlanType = $(this).hasClass('monthly') ? 'monthly' : 'yearly';
                $('.pricing-plan').each(function(index) {
                    $(this).find('.price').html(`${prices[selectedPlanType][index]} <span>${prices[selectedPlanType === 'monthly' ? 'yearly' : 'monthly'][index]}</span>`);
                });
            });


           $('.pay-now').on('click', function () {
                const planName  = $(this).data('plan');
                const amountVal = $(this).data('amount');
                const amount    = selectedPlanType === 'monthly' ? prices.monthly[1] : prices.yearly[1];
                openPaymentPopup(planName, amount, selectedPlanType);
            });

            function getPlanAmount(planIndex, planType) {
                let amount;
                switch (planType) {
                    case 'monthly':
                        amount = prices.monthly[planIndex];
                        break;
                    case 'yearly':
                        amount = prices.yearly[planIndex];
                        break;
                    default:
                        amount = '0€';
                        break;
                }
                return amount;
            }


           function openPaymentPopup(planName, amount, planType) {
                setTimeout(function() {
                    $('#amount').val(amount);
                    $('#ticket-popup').attr('data-plan', `${planName} (${planType === 'monthly' ? 'Mujore' : 'Vjetore'})`);
                    $('#ticket-popup').show();
                }, 1000); 
            }
            
            $('#ticket-popup .close, #ticket-popup button[type="button"]').on('click', function() {
                $('#ticket-popup').hide();
            });

            $('#ticket-form').on('submit', function(event) {
                event.preventDefault();

                const firstName = $('#first-name').val();
                const lastName = $('#last-name').val();
                const email = $('#email').val();
                const accountNumber = $('#account-number').val();
                const amount = $('#amount').val();
                const selectedPlan = $('#ticket-popup').attr('data-plan');

                if (firstName && lastName && email && accountNumber) {
                    alert(`Pagesa e suksesshme për planin: ${selectedPlan}\nEmri: ${firstName} ${lastName}\nEmail: ${email}\nShuma: ${amount}`);
                    $('#ticket-popup').hide();
                } else {
                    alert('Ju lutem plotësoni të gjitha fushat!');
                }
            });
        });


        fetch('nav.html')
            .then(response => response.text())
            .then(data => {
                document.getElementById('navbar-container').innerHTML = data;
            })
            .catch(error => console.error('Gabim gjatë ngarkimit të navbar-it:', error));

        document.getElementById('toggleTable').addEventListener('click', function() {
            var table = document.getElementById('artistTable');
            var button = document.getElementById('toggleTable');
            if (table.style.opacity === '0' || table.style.display === 'none') {
                table.style.display = 'table';
                setTimeout(function() {
                    table.style.opacity = '1';
                    table.style.maxHeight = '500px';
                }, 10);
                button.style.position = 'relative';
                button.style.marginBottom = '20px';
            } else {
                table.style.opacity = '0';
                table.style.maxHeight = '0';
                setTimeout(function() {
                    table.style.display = 'none';
                }, 1000);
            }
        });