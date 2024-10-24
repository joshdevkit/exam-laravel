<div id="delete-modal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="fixed inset-0 bg-black opacity-30"></div> <!-- Semi-transparent overlay -->
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full z-10">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Confirm Deletion</h2>
        <p class="text-gray-600">Are you sure you want to delete this user? This action cannot be undone.</p>
        <div class="mt-4 flex justify-end">
            <button id="cancel-button"
                class="bg-gray-300 text-gray-800 hover:bg-gray-400 rounded-md px-4 py-2 mr-2">Cancel</button>
            <form id="delete-form" action="" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="bg-red-600 text-white hover:bg-red-700 rounded-md px-4 py-2">Delete</button>
            </form>
        </div>
    </div>
</div>

<script>
    function openDeleteModal(url) {
        const modal = document.getElementById('delete-modal');
        const deleteForm = document.getElementById('delete-form');
        deleteForm.action = url;
        modal.classList.remove('hidden');

        document.getElementById('cancel-button').onclick = () => {
            modal.classList.add('hidden');
        };
    }
</script>
