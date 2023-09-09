<button
    x-data="{ action: '' }"
    x-swipe:right="action === 'delete' ? action = '' : action = 'edit'"
    x-swipe:left="action === 'edit' ? action = '' : action = 'delete'"
    class="flex gap-2"
>
    <span class="py-4 px-2 bg-green-600" x-show="action === 'edit'" x-cloak>Aanpassen</span>
    <span class="py-4 px-2 bg-blue-500 inline-block" x-show="action === ''">Swipe me</span>
    <span class="py-4 px-2 bg-red-600" x-show="action === 'delete'" x-cloak>Verwijder</span>
</button>
