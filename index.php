<?php
require_once './database/connect.php';
$database = new Database();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Главная</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/assets/css/main.css">
</head>
</head>
<body>
<div class="__container">
    <div class="mortgage">
        <h2 class="title">
            рассчитайте ипотеку
        </h2>
        <div class="mortgage__body">
            <div class="ranchs__form">
                <div class="range-block">
                    <div class="subtitle">Стоимость недвижимости</div>
                    <div class="range-input">
                        <div class="range__meaning"><output id="rangevalue1">600000</output>₽</div>
                        <input id="range_1" type="range" min="1000000" max="150000000" value=""  oninput="rangevalue1.value=value">

                    </div>
                </div>

                <div class="range-block">
                    <div class="subtitle">Первоначальный взнос</div>
                    <div class="range-input">
                        <div class="range__meaning">
                            Процент от стоимости недвижимости: <output id="rangevalue2">33</output> %
                        </div>
                        <input id="range_2" type="range" min="10" max="90" value="33"  oninput="rangevalue2.value=value">

                    </div>
                </div>

                <div class="range-block">
                    <div class="subtitle">Срок ипотеки</div>
                    <div class="range-input">
                        <div class="range-input__count range__meaning"><span class="minus">-</span><output id="rangevalue3">20</output><span class="plus">+</span></div>
                        <input id="range_3" type="range" min="1" max="40" value="20"  oninput="rangevalue3.value=value">

                    </div>
                </div>

                <div class="range-block total-summ">
                    <div class="subtitle">Сумма кредита </div>
                    <span>150000 ₽</span>
                </div>

                <div class="forms-tab">
                    <input type="radio" name="tabs" id="bank-tabs" checked="" class="bank-tabs">
                    <label for="bank-tabs" class="forms-tab__label">
                        Добавить Банк
                    </label>
                    <div class="tab">
                        <form action="app/controllers/createBank.php" method="POST" enctype="multipart/form-data" class="form-create">
                            <div class="form-group">
                                <label for="logo">Логотип:</label>
                                <input type="file" name="logo" id="logo">
                            </div>
                            <div class="form-group">
                                <label for="name">Название:</label>
                                <input type="text" name="name" id="name">
                            </div>
                            <div class="form-group">
                                <label for="interest_rate">Процентная ставка:</label>
                                <input type="number" name="interest_rate" id="interest_rate">
                            </div>
                            <div class="form-group">
                                <label for="loan_term">Срок кредита (в месяцах):</label>
                                <input type="number" name="loan_term" id="loan_term">
                            </div>
                            <div class="form-group">
                                <label for="monthly_payment">Ежемесячный платеж:</label>
                                <input type="number" name="monthly_payment" id="monthly_payment">
                            </div>
                            <input class="btn" type="submit" value="Отправить">
                        </form>
                    </div>
                    <input type="radio" id="promotion-tabs" name="tabs" class="promotion-tabs ">
                    <label for="promotion-tabs" class="forms-tab__label">
                        Добавить акцию
                    </label>
                    <div class="tab">
                        <form action="app/controllers/createPromotion.php" method="POST" enctype="multipart/form-data" class="form-create">
                            <div class="form-group">
                                <label for="background">Фон:</label>
                                <input type="file" name="background" id="background">
                            </div>
                            <div class="form-group">
                                <label for="title">Заголовок:</label>
                                <input type="text" name="title" id="title">
                            </div>
                            <div class="form-group">
                                <label for="subtitle">Подзаголовок:</label>
                                <input type="text" name="subtitle" id="subtitle">
                            </div>
                            <div class="form-group">
                                <label for="interest_rate">Процентная ставка:</label>
                                <input type="number" name="interest_rate" id="interest_rate">
                            </div>
                            <div class="form-group">
                                <label for="target_audience">Целевая аудитория:</label>
                                <input type="text" name="target_audience" id="target_audience">
                            </div>
                            <input class="btn" type="submit" value="Отправить">
                        </form>
                    </div>

                </div>
            </div>
            <div class="cards__body">
                <?php
                $query = "SELECT * FROM `Bank`";
                $bankData = $database->query($query);

                foreach ($bankData as $bank): ?>
                    <div class="card">
                        <img src="<?php echo $bank['logo']; ?>" alt="<?php echo $bank['name']; ?>" class="card__logo">
                        <h3 class="card__title subtitle"><?php echo $bank['name']; ?></h3>
                        <span class="card__percent">от <?php echo $bank['interest_rate']; ?> %</span>
                        <span class="card__year">до <?php echo $bank['loan_term']; ?> лет</span>
                        <span class="card__price"><?php echo $bank['monthly_payment']; ?> ₽/мес</span>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>

    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php
                $query = "SELECT * FROM `Promotion`";
                $promotionData = $database->query($query);

                foreach ($promotionData as $promotion): ?>
                <div class="swiper-slide" style="background: url(<?php echo $promotion['background']; ?>) center no-repeat;">
                    <div class="swiper-container">
                        <div class="swiper-info">
                            <h2 class="title">
                                <?php echo $promotion['title']; ?> <?php echo $promotion['interest_rate']; ?> %
                            </h2>
                            <div class="swiper-text">
                                <?php echo $promotion['subtitle']; ?>
                            </div>
                        </div>
                        <button class="btn btn_red">
                            Подробнее
                        </button>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
        pagination: {
            el: ".swiper-pagination",
        },
        loop: true,
        autoplay: {
            delay: 3000,
        },
    });
</script>
<script>


    const rangeInputs = document.querySelectorAll('input[type="range"]')

    function handleInputChange(e) {
        let target = e.target
        if (e.target.type !== 'range') {
            target = document.getElementById('range')
        }
        const id = target.id;
        const min = target.min
        const max = target.max
        const val = target.value
        const name = target.name

        target.style.backgroundSize = (val - min) * 100 / (max - min) + '% 100%'
        target.val = val - min;
        document.getElementById(id).style.fontSize = (val);
    }
    rangeInputs.forEach(input => {

        input.addEventListener('input', handleInputChange)
    })
    document.addEventListener('DOMContentLoaded', function() {
        rangeInputs.forEach(input => {
            handleInputChange({ target: input });
        });
    });

</script>
<script>
    const minusButton = document.querySelector('.range-input__count span:first-child');
    const plusButton = document.querySelector('.range-input__count span:last-child');
    const rangeInput = document.getElementById('range_3');
    const rangeValueOutput = document.getElementById('rangevalue3');
    function updateRangeValue(newValue) {
        rangeInput.value = newValue;
        rangeInput.style.backgroundSize = ((newValue - rangeInput.min) * 100) / (rangeInput.max - rangeInput.min) + '% 100%';
        rangeValueOutput.textContent = newValue;
    }

    minusButton.addEventListener('click', () => {
        const currentValue = parseInt(mortgageTermInput.value, 10);
        if (currentValue > 1) {

            mortgageTermInput.value = currentValue - 1;
            updateMonthlyPayment();
            updateRangeValue(currentValue - 1);
        }
    });

    plusButton.addEventListener('click', () => {
        const currentValue = parseInt(mortgageTermInput.value, 10);
        if (currentValue < 40) {
            mortgageTermInput.value = currentValue + 1;
            updateMonthlyPayment();
            updateRangeValue(currentValue + 1);
        }
    });



</script>
<script>
    const costInput = document.getElementById('range_1');
    const initialPaymentInput = document.getElementById('range_2');
    const mortgageTermInput = document.getElementById('range_3');
    const totalSumElement = document.querySelector('.total-summ span');
    const bankCards = document.querySelectorAll('.card__price');
    const bankMaxTerms = document.querySelectorAll('.card__year');

    function updateTotalSum() {
        const cost = parseInt(costInput.value, 10);
        const initialPayment = (parseInt(initialPaymentInput.value, 10) / 100) * cost;
        const totalSum = cost - initialPayment;
        totalSumElement.textContent = totalSum.toLocaleString() + ' ₽';
    }

    function updateMonthlyPayment() {
        const mortgageTerm = parseInt(mortgageTermInput.value, 10);
        const totalSum = parseInt(totalSumElement.textContent.replace(/\D/g, ''), 10);

        bankCards.forEach((card, index) => {
            const maxTerm = parseInt(bankMaxTerms[index].textContent.replace(/\D/g, ''), 10);

            if (mortgageTerm <= maxTerm) {
                const interestRate = 0.03;
                const monthlyInterestRate = interestRate / 12;
                const numPayments = mortgageTerm * 12;
                const monthlyPayment = (totalSum * monthlyInterestRate) / (1 - Math.pow(1 + monthlyInterestRate, -numPayments));
                const monthlyPaymentString = monthlyPayment.toLocaleString(undefined, { minimumFractionDigits: 0, maximumFractionDigits: 0 }) + ' ₽';

                card.textContent = monthlyPaymentString + '/мес';
            } else {
                card.textContent = 'нет';
            }
        });
    }

    costInput.addEventListener('input', () => {
        updateTotalSum();
        updateMonthlyPayment();
    });

    initialPaymentInput.addEventListener('input', () => {
        updateTotalSum();
        updateMonthlyPayment();
    });

    mortgageTermInput.addEventListener('input', () => {
        updateMonthlyPayment();
    });

    updateTotalSum();
    updateMonthlyPayment();
</script>

</body>
</html>