<template>
    <div class="reservation-card-inner">
        <div class="reservation-title">
            <p>予約</p>
        </div>
        <form class="reservation-form" action="/reservation" method="POST">
            <div>
                <input type="hidden" name="_token" :value="csrf">
                <div class="reservation-form__form">
                    <input class="reservation-form__id" name="id" type="hidden" placeholder="today" v-model="id">
                </div>
                <div class="reservation-form__form">
                    <input class="reservation-form__date" name="reservation_date" type="date"  v-model="reservation_date">
                </div>
                <div class="reservation-form__form">
                    <input class="reservation-form__time" name="reservation_time" type="time" v-model="reservation_time" step="1800" list="data-list">
                    <datalist id="data-list">
                        <option value="09:00"></option>
                        <option value="09:30"></option>
                        <option value="10:00"></option>
                        <option value="10:30"></option>
                        <option value="11:00"></option>
                        <option value="11:30"></option>
                        <option value="12:00"></option>
                        <option value="12:30"></option>
                        <option value="13:00"></option>
                        <option value="13:30"></option>
                        <option value="14:00"></option>
                        <option value="14:30"></option>
                        <option value="15:00"></option>
                        <option value="15:30"></option>
                        <option value="16:00"></option>
                        <option value="16:30"></option>
                        <option value="17:00"></option>
                        <option value="17:30"></option>
                        <option value="18:00"></option>
                        <option value="18:30"></option>
                        <option value="19:00"></option>
                        <option value="19:30"></option>
                        <option value="20:00"></option>
                        <option value="21:30"></option>
                        <option value="21:00"></option>
                        <option value="22:30"></option>
                        <option value="22:00"></option>
                    </datalist>
                </div>
                <div class="reservation-form__form">
                    <select class="reservation-form__number" name="reservation_number" v-model="reservation_number">
                        <option value=""  hidden>人数</option>
                        <option value="1" >1人</option>
                        <option value="2" >2人</option>
                        <option value="3" >3人</option>
                        <option value="4" >4人</option>
                        <option value="5" >5人</option>
                        <option value="6" >6人</option>
                    </select>
                </div>
            </div>
            <div class="confirm">
                <div class="confirm__inner">
                    <div class="confirm-group">
                        <div class="confirm__content">
                            <p>Shop</p>
                        </div>
                        <div class="confirm__content">
                            <p>{{ shopName }}</p>
                        </div>
                    </div>
                    <div class="confirm-group">
                        <div class="confirm__content">
                            <p>Date</p>
                        </div>
                        <div class="confirm__content">
                            <p>{{ reservation_date }}</p>
                        </div>
                    </div>
                    <div class="confirm-group">
                        <div class="confirm__content">
                            <p>Time</p>
                        </div>
                        <div class="confirm__content">
                            <p>{{ reservation_time }}</p>
                        </div>
                    </div>
                    <div class="confirm-group">
                        <div class="confirm__content-number">
                            <p>Number</p>
                        </div>
                        <div class="confirm__content">
                            <p>{{ reservation_number }}人</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="error-log">
                <p class="error" v-for="value in error.reservation_date">{{ value }}</p>
                <p class="error" v-for="value in error.reservation_time">{{ value }}</p>
                <p class="error" v-for="value in error.reservation_number">{{ value }}</p>
                <p class="error" v-for="value in error.reservation_at">{{ value }}</p>
            </div>
            <div class="reservation-form__submit">
                <input type="submit"  class="reservation-form__submit-button" value="予約する">
            </div>
        </form>
    </div>
</template>

<script>
export default {
    props: ['old','errors','shopName','shopId'],
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            reservation_date: this.old.reservation_date,
            reservation_time: this.old.reservation_time,
            reservation_number: this.old.reservation_number,
            id: this.shopId,
            error: {
                reservation_date: this.errors.reservation_date,
                reservation_time: this.errors.reservation_time,
                reservation_number: this.errors.reservation_number,
                reservation_at: this.errors.reservation_at,
            }
        }
    },
    created() {
        this.shop_name = this.reservation_number
    },
}
</script>


