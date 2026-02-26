<!-- ============================================================ -->
<!-- GET A QUOTE MODAL - Compact Grid Layout                     -->
<!-- ============================================================ -->

<!-- Quote Form Modal - CENTER MODAL -->
<div id="quoteModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
    <div id="quoteModalContent" class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl transform scale-95 transition-transform duration-300 max-h-[90vh] overflow-y-auto">

        <!-- Header -->
        <div class="bg-gradient-to-r from-primary to-blue-900 text-white p-5 rounded-t-2xl sticky top-0 z-10">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-xl font-bold">Request a Quote</h3>
                    <p class="text-blue-100 text-xs mt-1">Get competitive pricing for your needs</p>
                </div>
                <button onclick="closeQuoteModal()" class="text-white hover:text-gray-200 transition p-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Compact Form in Grid -->
        <form id="quoteForm" class="p-6" onsubmit="return handleQuoteFormSubmit(event)">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <!-- Full Name -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-1.5 text-sm">Full Name <span class="text-red-500">*</span></label>
                    <input 
                        type="text" 
                        name="fullName"
                        required 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary text-sm" 
                        placeholder="Enter your name">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-1.5 text-sm">Email Address <span class="text-red-500">*</span></label>
                    <input 
                        type="email" 
                        name="email"
                        required 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary text-sm" 
                        placeholder="your@email.com">
                </div>

                <!-- Phone -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-1.5 text-sm">Phone Number <span class="text-red-500">*</span></label>
                    <input 
                        type="tel" 
                        name="phone"
                        required 
                        pattern="[0-9]{10}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary text-sm" 
                        placeholder="+91 XXXXX XXXXX">
                </div>

                <!-- Company -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-1.5 text-sm">Company Name</label>
                    <input 
                        type="text" 
                        name="company"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary text-sm" 
                        placeholder="Your company name">
                </div>

                <!-- Product Category -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-1.5 text-sm">Product Category <span class="text-red-500">*</span></label>
                    <select 
                        name="product"
                        required 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary text-sm">
                        <option value="">Select a category</option>
                        <option value="gate-valves">Gate Valves</option>
                        <option value="globe-valves">Globe Valves</option>
                        <option value="ball-valves">Ball Valves</option>
                        <option value="non-return-valves">Non Return Valves</option>
                        <option value="butterfly-valves">Butterfly Valves</option>
                        <option value="knife-edge-gate-valves">Knife Edge Gate Valves</option>
                        <option value="piston-valves">Piston Valves</option>
                        <option value="plug-valves">Plug Valves</option>
                        <option value="diaphragm-valves">Diaphragm Valves</option>
                        <option value="strainers">Strainers</option>
                        <option value="safety-valves">Safety Valves</option>
                        <option value="prv">PRV</option>
                        <option value="air-valves">Air Valves</option>
                        <option value="flanges">Flanges</option>
                        <option value="pipes-fittings">Pipes & Fittings</option>
                        <option value="ms-pipes">MS Pipes</option>
                        <option value="ibr-pipes">IBR Pipes</option>
                        <option value="gi-pipes">GI Pipes</option>
                        <option value="ss-pipes">SS Pipes</option>
                        <option value="hdpe-pipes">HDPE Pipes</option>
                        <option value="seamless-pipes">Seamless Pipes</option>
                        <option value="erw-pipes">ERW Pipes</option>
                        <option value="brass-fittings">Brass Fittings</option>
                        <option value="hydraulic-fittings">Hydraulic Fittings</option>
                        <option value="pneumatic-fittings">Pneumatic Fittings</option>
                        <option value="dairy-valves">Dairy Valves</option>
                        <option value="boiler-mounting">Boiler Mounting</option>
                        <option value="boiler-tubes">Boiler Tubes</option>
                        <option value="pressure-gauges">Pressure Gauges</option>
                        <option value="fire-fighting">Fire Fighting Equipment</option>
                        <option value="hose-clips">Hose Clips</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <!-- Quantity -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-1.5 text-sm">Quantity Required</label>
                    <input 
                        type="text" 
                        name="quantity"
                        placeholder="e.g., 50 units" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary text-sm">
                </div>

                <!-- Message - Full Width -->
                <div class="md:col-span-2">
                    <label class="block text-gray-700 font-semibold mb-1.5 text-sm">Requirements / Message <span class="text-red-500">*</span></label>
                    <textarea 
                        name="message"
                        required 
                        rows="3" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary text-sm resize-none" 
                        placeholder="Please describe your requirements..."></textarea>
                </div>
            </div>

            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full bg-secondary hover:bg-red-700 text-white font-bold py-3 rounded-lg transition transform hover:scale-105 shadow-lg mt-4">
                Submit Quote Request
            </button>

            <!-- Footer Note -->
            <p class="text-xs text-gray-500 text-center mt-3">We'll respond to your quote request within 24 hours</p>
        </form>
    </div>
</div>

<!-- ============================================================ -->
<!-- MODAL JAVASCRIPT - Opening, Closing, Form Handling          -->
<!-- ============================================================ -->

<style>
/* Modal Animation */
#quoteModal.show {
    display: flex !important;
}

#quoteModal.show #quoteModalContent {
    transform: scale(1);
}

/* Smooth Scrollbar for Modal */
#quoteModalContent::-webkit-scrollbar {
    width: 8px;
}

#quoteModalContent::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

#quoteModalContent::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 10px;
}

#quoteModalContent::-webkit-scrollbar-thumb:hover {
    background: #555;
}

/* Prevent body scroll when modal is open */
body.modal-open {
    overflow: hidden;
}
</style>

<script>
/**
 * Open Quote Modal
 */
function openQuoteModal() {
    const modal = document.getElementById('quoteModal');
    if (modal) {
        modal.classList.remove('hidden');
        modal.classList.add('show');
        document.body.classList.add('modal-open');

        // Focus on first input for better UX
        setTimeout(() => {
            const firstInput = modal.querySelector('input[name="fullName"]');
            if (firstInput) firstInput.focus();
        }, 300);

        console.log('✓ Quote modal opened');
    }
}

/**
 * Close Quote Modal
 */
function closeQuoteModal() {
    const modal = document.getElementById('quoteModal');
    if (modal) {
        modal.classList.remove('show');
        document.body.classList.remove('modal-open');

        // Delay hiding to allow animation
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);

        console.log('✓ Quote modal closed');
    }
}

/**
 * Close modal when clicking outside
 */
document.getElementById('quoteModal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closeQuoteModal();
    }
});

/**
 * Close modal on ESC key
 */
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        const modal = document.getElementById('quoteModal');
        if (modal && !modal.classList.contains('hidden')) {
            closeQuoteModal();
        }
    }
});

/**
 * Handle Form Submission
 */
function handleQuoteFormSubmit(event) {
    event.preventDefault();

    // Get form data
    const form = document.getElementById('quoteForm');
    const formData = new FormData(form);
    const data = Object.fromEntries(formData);

    console.log('Quote form submitted:', data);

    // Show success message
    alert('Thank you for your quote request! We will contact you within 24 hours.');

    // Reset form
    form.reset();

    // Close modal
    closeQuoteModal();

    // TODO: Send data to server via AJAX
    // Example implementation:
    /*
    fetch('submit_quote.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Thank you! We will contact you within 24 hours.');
            form.reset();
            closeQuoteModal();
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error submitting request. Please try again.');
    });
    */

    return false;
}

console.log('✓ Quote modal script loaded');
</script>
