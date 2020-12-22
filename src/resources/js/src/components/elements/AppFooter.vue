<template>
    <div class="app-fluid g-bg-primary">
        <div class="app-container">
            <footer>
                <p>&copy; 2020</p>
            </footer>
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
$color-primary: #5452f6;
$color-white: #ffffff;
footer {
    min-height: 50px;
    padding: 16px 0;
    display: flex;
    align-items: center;
    margin-top: 40px;
    color: $color-white;
    @media only screen and (max-width: 768px) {
        padding: 8px;
    }
}
</style>
