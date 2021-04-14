<div class="statistics">
    <div class="row">
      <div class="col-xl-6 pr-xl-2">
        <div class="row">
          <div class="col-sm-6 pr-sm-2 statistics-grid">
            <div class="card card_border border-primary-top p-4">
              <i class="fa fa-users"> </i>
              <h3 class="text-primary number">{{ $total_customer }}</h3>
              <p class="stat-text">Tổng khách hàng</p>
            </div>
          </div>
          <div class="col-sm-6 pl-sm-2 statistics-grid">
            <div class="card card_border border-primary-top p-4">
              <i class="fa fa-google-wallet"> </i>
              <h3 class="text-secondary number" data-format-number-to-currency data-format-number-to-currency-number="{{ $total_money }}">{{ $total_money }}</h3>
              <p class="stat-text">Quỹ tiền mặt</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-6 pl-xl-2">
        <div class="row">
          <div class="col-sm-6 pr-sm-2 statistics-grid">
            <div class="card card_border border-primary-top p-4">
              <i class="fa fa-credit-card"> </i>
              <h3 class="text-success number" data-format-number-to-currency data-format-number-to-currency-number="{{ $total_loan_money }}">{{ $total_loan_money }}</h3>
              <p class="stat-text">Tổng tiền cho vay</p>
            </div>
          </div>
          <div class="col-sm-6 pl-sm-2 statistics-grid">
            <div class="card card_border border-primary-top p-4">
              <i class="fa fa-money"> </i>
              <h3 class="text-danger number" data-format-number-to-currency data-format-number-to-currency-number="{{ $total_expected_interest_money }}">{{ $total_expected_interest_money }}</h3>
              <p class="stat-text">Tổng lãi dự kiến</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-6 pl-xl-2">
        <div class="row">
          <div class="col-sm-6 pr-sm-2 statistics-grid">
            <div class="card card_border border-primary-top p-4">
              <i class="fa fa-file-text"> </i>
              <h3 class="text-success number">{{ $total_loan_agreement }}</h3>
              <p class="stat-text">Tổng hợp đồng cho vay</p>
            </div>
          </div>
          <div class="col-sm-6 pl-sm-2 statistics-grid d-none">
            <div class="card card_border border-primary-top p-4">
              <i class="fa fa-money"> </i>
              <h3 class="text-danger number">{{ $total_expected_interest_money }}</h3>
              <p class="stat-text">Tổng lãi dự kiến</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>