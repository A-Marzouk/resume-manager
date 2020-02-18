<template>
    <div class="achievements-bar sub-bar">
        <div class="bar-item" :class="{ active : selectedTab === 'PDF'}" @click="selectedTab = 'PDF'">
            PDF
        </div>
        <div class="bar-item" :class="{ active : selectedTab === 'Linkedin'}"
                @click="selectedTab = 'Linkedin'">
            Linkedin
        </div>
        <div class="bar-item" :class="{ active : selectedTab === 'Github'}"
                @click="selectedTab = 'Github'">
            Github
        </div>
        <div class="bar-item" :class="{ active : selectedTab === 'Behance'}"
                @click="selectedTab = 'Behance'">
            Behance
        </div>
        <div class="bar-item" :class="{ active : selectedTab === 'Word'}" @click="selectedSubTab = 'Word'">
            Word/docs
        </div>
    </div>
</template>
<script>
export default {
    data: () => ({
        selectedTab: 'PDF'
    })
}
</script>