<template>
    <div>
        <!--ハンバーガーメニューのボタン-->
        <div class="hamburger-btn" @click='active = !active'>
            <p>Rese</p>
            <span class="line line-top" :class="{ 'rotate-top': active }"></span>
            <span class="line line-middle" :class="{ 'rotate-middle': active }"></span>
            <span class="line line-bottom" :class="{ 'rotate-bottom': active }"></span>


            <!--ハンバーガーメニューの中身-->
            <transition name="hamburger-menu">
                <div class="hamburger-menu" v-show="active">
                    <ul>
                        <li>
                            <a class="header-nav__link" href="/">Home</a>
                        </li>
                        <li>
                            <form class="form" action="/logout" method="post">
                                <input type="hidden" name="_token" :value="csrf">
                                <button class="header-nav__button">Logout</button>
                            </form>
                        </li>
                        <li>
                            <a class="header-nav__link" href="/mypage">Mypage</a>
                        </li>
                    </ul>
                </div>
            </transition>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            active: false
        }
    }
}
</script>


