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


            $('.pricing-plan button').on('click', function() {
                const planIndex = $(this).closest('.pricing-plan').index();
                const planName = $(this).closest('.pricing-plan').find('h2').text();
                const amount = getPlanAmount(planIndex, selectedPlanType);

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
                $('#amount').val(amount);
                $('#ticket-popup').attr('data-plan', `${planName} (${planType === 'monthly' ? 'Mujore' : 'Vjetore'})`);
                $('#ticket-popup').show();
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