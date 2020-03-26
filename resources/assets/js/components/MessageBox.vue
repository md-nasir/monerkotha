<template>
    <div>
        <div v-if="msgtype === 'incomming'" class="incoming_msg">
            <div class="incoming_msg_img"><img src="/upload/img/user-profile.png" :alt="user"></div>
            <div class="received_msg">
                <div class="received_withd_msg">
                    <p>
                        <slot></slot>
                    </p>
                    <span class="time_date"> {{ time }}</span></div>
            </div>
        </div>
        <div v-if="msgtype === 'outgoing'" class="outgoing_msg">
            <div class="sent_msg">
                <p>
                    <slot></slot>
                </p>
                <span class="time_date"> {{ time }}</span></div>
        </div>
    </div>
</template>
<script>
    export default {
        props: [
            'user',
            'msgtype',
            'time',
        ]
    }
</script>
