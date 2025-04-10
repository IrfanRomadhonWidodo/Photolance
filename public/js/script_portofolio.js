     // Load More Button Functionality
    document.addEventListener('DOMContentLoaded', function() {
        const loadMoreBtn = document.getElementById('load-more-btn');
        const hiddenItems = document.querySelectorAll('.hidden-item');
        
        loadMoreBtn.addEventListener('click', function() {
            // Change button text to "Loading"
            this.querySelector('span').textContent = 'MEMUAT...';
            
            // Show hidden items with a slight delay for each
            setTimeout(() => {
                hiddenItems.forEach((item, index) => {
                    setTimeout(() => {
                        item.classList.remove('hidden');
                        item.classList.add('show');
                    }, index * 100);
                });
                
                // Update button text and disable it
                setTimeout(() => {
                    this.querySelector('span').textContent = 'SEMUA FOTO DITAMPILKAN';
                    this.disabled = true;
                    this.classList.add('opacity-70', 'cursor-not-allowed');
                    this.classList.remove('hover:text-white');
                    
                    // Remove hover effect from disabled button
                    const hoverBg = this.querySelector('.absolute');
                    if (hoverBg) {
                        hoverBg.remove();
                    }
                }, hiddenItems.length * 100 + 200);
            }, 800);
        });
        
        // Add hover effect to button
        loadMoreBtn.addEventListener('mouseenter', function() {
            const buttonBg = this.querySelector('.absolute');
            buttonBg.style.width = '100%';
        });
        
        loadMoreBtn.addEventListener('mouseleave', function() {
            const buttonBg = this.querySelector('.absolute');
            buttonBg.style.width = '0%';
        });
    });
