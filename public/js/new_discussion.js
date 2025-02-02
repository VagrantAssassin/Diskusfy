document.addEventListener("alpine:init", () => {
    Alpine.data("discussionForm", () => ({
        showModal: false,
        selectedCategory: '',
        categories: [],
        addCategory() {
            if (this.selectedCategory && !this.categories.includes(this.selectedCategory)) {
                this.categories.push(this.selectedCategory);
                this.showModal = false;
            }
        },
        removeCategory(index) {
            this.categories.splice(index, 1);
        }
    }));
});