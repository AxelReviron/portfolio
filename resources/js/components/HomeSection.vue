<script setup lang="ts">

</script>

<template>
    <div class="home-section-container">
        <div class="image-text-container">
            <img class="picture" src="../../images/picture.jpg" alt="picture"/>
            <div class="text-container">
                <h1 class="title">
                    Axel Reviron
                </h1>
                <h2 class="sub-title">
                    Full Stack Web Developer
                </h2>
                <p class="text">
                    Passionate about creating elegant, user-friendly web applications.
                    With over 5 years of experience, I specialize in modern JavaScript frameworks and responsive design, always focusing on delivering high-quality solutions.
                </p>
            </div>
        </div>
        <div class="buttons-container">

        </div>
    </div>
</template>

<style scoped>
.home-section-container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    border: solid 1px white;
    width: 100rem;
    height: 50rem;
}
.image-text-container {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    border: solid 1px white;
    width: 100%;
    height: 80%;
}
.picture {
    width: auto;
    height: 100%;
    border-radius: 1rem;
}
.text-container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    padding: 4rem;
    border: solid 1px white;
}
.title {
    color: white;
    font-family: Apple,serif;
    font-size: 8rem;
}
.sub-title {
    color: rgba(255, 255, 255, 0.69);
    font-family: Apple,serif;
    font-size: 4rem;
}
.text {
    color: rgba(255, 255, 255, 0.69);
    font-family: Apple,serif;
    font-size: 2rem;
}
.buttons-container {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    border: solid 1px white;
    width: 100%;
    height: 20%;
}
</style>
