<script>
export default {
    data() {
        return {
            notificationCount: 0,
        };
    },
    mounted() {
        async function updateNotification() {
            const response = await fetch("/notification");
            const jsonData = await response.json();

            return jsonData;
        }

        setInterval(() => {
            updateNotification().then((response) => {
                this.notificationCount = response[0].total;
            });
        }, 3000);
    },
};
</script>

<template>
    <div class="h-16 bg-slate-800 flex justify-between px-8">
        <h1 class="text-white font-bold self-center justify-center flex">
            <a href="/"> Mock eCommerce </a>
        </h1>
        <div class="self-center flex gap-4">
            <a class="self-center" href="/mycart">
                <svg
                    style="color: white"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    fill="currentColor"
                    class="bi bi-cart"
                    viewBox="0 0 16 16"
                >
                    <path
                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                        fill="white"
                    ></path>
                </svg>
            </a>
            <a href="/admin" class="relative">
                <svg
                    style="color: white"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    fill="currentColor"
                    class="bi bi-bell"
                    viewBox="0 0 16 16"
                >
                    <path
                        d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"
                    />
                </svg>
                <span
                    v-if="this.notificationCount != 0"
                    class="absolute text-white text-xs top-0 right-0 bg-rose-700 rounded-lg px-1"
                    >{{ this.notificationCount }}</span
                >
            </a>
        </div>
    </div>
</template>
