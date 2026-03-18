<x-site-layout title="Detective Board : {{ $project->title }}">
    
    <div class="max-w-full mx-auto p-4 md:p-6 mt-4 md:mt-8">
        
        <div class="flex justify-between items-center mb-4 bg-white p-4 rounded-xl shadow-sm border border-gray-100">
            <h2 class="font-bold text-2xl text-gray-800 flex items-center gap-3">
                <a href="{{ route('projects.show', $project->id) }}" class="text-gray-400 hover:text-blue-500 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                </a>
                🕵️‍♂️ Detective Board : <span class="text-blue-600">{{ $project->title }}</span>
            </h2>
           <div class="flex items-center gap-3 bg-white p-2 rounded-xl shadow-sm border border-gray-100">
                <button id="resetBoardBtn" class="flex items-center gap-2 bg-white hover:bg-gray-50 text-gray-600 font-bold py-2.5 px-4 rounded-lg border border-gray-200 shadow-sm transition-all active:scale-95">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    <span class="text-sm">Reset View</span>
                </button>

                <form action="{{ route('board.clear', $project->id) }}" method="POST" class="inline-block m-0" onsubmit="return confirm('⚠️ Are you sure you want to clear the board? \n\nAll notes and links will be deleted and cannot be recovered!');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="flex items-center gap-2 bg-red-50 hover:bg-red-100 text-red-600 font-bold py-2.5 px-4 rounded-lg border border-red-200 shadow-sm transition-all active:scale-95 group" title="delete all notes and links">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 group-hover:rotate-12 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        <span class="text-sm">Clear Board</span>
                    </button>
                </form>
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-4" style="height: calc(100vh - 160px); min-height: 500px;">
            
            <div class="w-full md:w-64 bg-white border border-gray-200 shadow-sm rounded-2xl flex flex-col overflow-hidden flex-shrink-0">
                <div class="p-4 border-b border-gray-100 bg-gray-50">
                    <h3 class="font-bold text-gray-700 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                        ตัวละคร
                    </h3>
                    <p class="text-xs text-gray-500 mt-1">ลากตัวละครไปวางบนบอร์ด</p>
                </div>
                
                <div class="p-3 overflow-y-auto flex-1 space-y-2 bg-gray-50/50">
                    {{-- 💡 วนลูปตัวละครที่ส่งมาจาก Controller --}}
                    @if(isset($characters) && $characters->count() > 0)
                        @foreach($characters as $character)
                            <div class="bg-white p-3 rounded-xl border border-gray-200 shadow-sm cursor-grab hover:border-blue-400 hover:shadow-md transition flex items-center gap-3"
                                 draggable="true"
                                 ondragstart="dragCharacter(event)"
                                 data-char-id="{{ $character->id }}"
                                 data-char-name="{{ $character->name }}">
                                <div class="w-8 h-8 bg-blue-100 text-blue-700 rounded-full flex items-center justify-center font-bold text-sm">
                                    {{ mb_substr($character->name, 0, 1) }}
                                </div>
                                <span class="font-medium text-gray-700 text-sm truncate">{{ $character->name }}</span>
                            </div>
                        @endforeach
                    @else
                        <p class="text-sm text-gray-400 text-center mt-4">ไม่มีตัวละครในโปรเจกต์นี้</p>
                    @endif
                </div>
            </div>

            <div class="relative flex-grow overflow-hidden bg-gray-50 border-2 border-dashed border-gray-300 rounded-2xl shadow-inner" 
                 id="boardContainer"
                 ondragover="allowDrop(event)"
                 ondrop="dropOnBoard(event)">
                
                <div class="absolute inset-0 pointer-events-none opacity-50" style="background-image: radial-gradient(#cbd5e1 1px, transparent 1px); background-size: 20px 20px; z-index: 0;"></div>

                <svg id="linesOverlay" class="absolute top-0 left-0 w-full h-full pointer-events-none" style="z-index: 1;"></svg>
                <div id="labelsOverlay" class="absolute top-0 left-0 w-full h-full pointer-events-none" style="z-index: 5;"></div>

                @foreach($notes as $note)
                    <div class="board-note absolute w-56 h-auto min-h-[8rem] p-3 shadow-lg cursor-grab active:cursor-grabbing rounded-xl border border-gray-300 {{ $note->color ?? 'bg-white' }} transition-shadow hover:shadow-xl flex flex-col"
                         style="z-index: 10; transform: translate({{ $note->pos_x }}px, {{ $note->pos_y }}px);"
                         data-id="{{ $note->id }}"
                         data-x="{{ $note->pos_x }}"
                         data-y="{{ $note->pos_y }}">
                        
                        <div class="absolute -left-3 top-1/2 transform -translate-y-1/2 z-20 group connect-wrapper">
                            <button onclick="deleteLinksOfNote({{ $note->id }})" class="absolute -top-7 left-1/2 transform -translate-x-1/2 w-6 h-6 bg-gray-200 text-gray-600 rounded-full text-lg font-black flex items-center justify-center opacity-0 group-hover:opacity-100 hover:bg-red-500 hover:text-white transition-all shadow-md link-delete-btn cursor-pointer pointer-events-auto" data-note-id="{{ $note->id }}" style="display: none;" title="delete link">-</button>
                            <div class="w-5 h-5 bg-gray-800 rounded-full cursor-crosshair hover:scale-125 transition-transform border-2 border-white shadow-md connect-dot pointer-events-auto" data-id="{{ $note->id }}" title="connect to"></div>
                        </div>

                        <div class="absolute -right-3 top-1/2 transform -translate-y-1/2 z-20 group connect-wrapper">
                            <button onclick="deleteLinksOfNote({{ $note->id }})" class="absolute -top-7 left-1/2 transform -translate-x-1/2 w-6 h-6 bg-gray-200 text-gray-600 rounded-full text-lg font-black flex items-center justify-center opacity-0 group-hover:opacity-100 hover:bg-red-500 hover:text-white transition-all shadow-md link-delete-btn cursor-pointer pointer-events-auto" data-note-id="{{ $note->id }}" style="display: none;" title="delete link">-</button>
                            <div class="w-5 h-5 bg-gray-800 rounded-full cursor-crosshair hover:scale-125 transition-transform border-2 border-white shadow-md connect-dot pointer-events-auto" data-id="{{ $note->id }}" title="connect to"></div>
                        </div>

                        <div class="w-full flex justify-end mb-1">
                            <button onclick="deleteNote({{ $note->id }})" class="text-gray-300 hover:text-red-500 font-bold text-xl transition-colors cursor-pointer pointer-events-auto">&times;</button>
                        </div>

                        <textarea class="flex-grow w-full bg-transparent border-transparent border-0 outline-none focus:outline-none focus:border-transparent focus:ring-0 resize-none text-gray-800 font-bold text-lg leading-relaxed placeholder-gray-400 px-1 pb-1 pointer-events-auto text-center" 
                                  placeholder="เพิ่มรายละเอียด..."
                                  onchange="updateNoteContent({{ $note->id }}, this.value)">{{ $note->content }}</textarea>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js"></script>
    <script>
        const projectId = '{{ $project->id }}';
        const csrfToken = '{{ csrf_token() }}';
        
        let boardLinks = @json($links); 
        const svgOverlay = document.getElementById('linesOverlay');
        const labelsOverlay = document.getElementById('labelsOverlay');
        const boardContainer = document.getElementById('boardContainer');

        // ==========================================
        // 🌟 ใหม่: ระบบ Drag & Drop จาก Sidebar ลงบอร์ด
        // ==========================================
        function dragCharacter(event) {
            // เมื่อเริ่มลาก ให้เก็บชื่อและ ID ของตัวละครไว้ในหน่วยความจำชั่วคราว
            event.dataTransfer.setData("charName", event.target.getAttribute('data-char-name'));
            event.dataTransfer.setData("charId", event.target.getAttribute('data-char-id'));
            event.target.style.opacity = '0.5'; // ทำให้การ์ดที่ถูกลากจางลงนิดนึง
        }

        document.addEventListener('dragend', (event) => {
            if(event.target.style) event.target.style.opacity = '1'; // คืนค่าความชัดเมื่อปล่อยเมาส์
        });

        function allowDrop(event) {
            event.preventDefault(); // อนุญาตให้ดรอปลงบอร์ดได้
        }

        function dropOnBoard(event) {
            event.preventDefault();
            const charName = event.dataTransfer.getData("charName");
            if(!charName) return; // ถ้าไม่ได้ลากตัวละครมา ให้ข้ามไป

            // คำนวณหาจุด X, Y ที่เมาส์ปล่อยลงบนบอร์ด
            const rect = boardContainer.getBoundingClientRect();
            // หักลบความกว้าง/สูง ของการ์ดนิดหน่อย เพื่อให้เมาส์อยู่ตรงกลางการ์ดพอดี
            const dropX = event.clientX - rect.left - 100; 
            const dropY = event.clientY - rect.top - 50;

            // ยิงข้อมูลไปสร้าง Note ใหม่ โดยใส่ชื่อตัวละครเป็น Content
            fetch(`/projects/${projectId}/board/notes`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                body: JSON.stringify({ 
                    pos_x: dropX, 
                    pos_y: dropY, 
                    color: 'bg-white', // ให้เป็นสีขาวเหมือนรูปโพลารอยด์
                    content: charName 
                })
            }).then(res => res.json()).then(data => { 
                if(data.success) location.reload(); // โหลดหน้าใหม่เพื่อแสดงตัวละครบนบอร์ด
            });
        }

        // ==========================================
        // 1. Draggable Notes system using Interact.js (ของเดิม)
        // ==========================================
        interact('.board-note').draggable({
            inertia: true,
            ignoreFrom: '.connect-wrapper, button, textarea', 
            modifiers: [
                interact.modifiers.restrictRect({ restriction: 'parent', endOnly: true })
            ],
            listeners: {
                move (event) {
                    const target = event.target;
                    const x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx;
                    const y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;
                    target.style.transform = `translate(${x}px, ${y}px)`;
                    target.setAttribute('data-x', x);
                    target.setAttribute('data-y', y);
                    renderLines(); 
                },
                end (event) {
                    const target = event.target;
                    fetch(`/projects/${projectId}/board/notes/${target.getAttribute('data-id')}/position`, {
                        method: 'PUT',
                        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                        body: JSON.stringify({ pos_x: target.getAttribute('data-x'), pos_y: target.getAttribute('data-y') })
                    });
                }
            }
        });

        // ==========================================
        // 2. Drag to Connect Notes with temporary line (ของเดิม)
        // ==========================================
        let isDraggingLine = false;
        let tempLine = null;
        let startNoteId = null;

        boardContainer.addEventListener('mousedown', function(e) {
            if(e.target.classList.contains('connect-dot')) {
                isDraggingLine = true;
                startNoteId = e.target.getAttribute('data-id');
                
                const rect = e.target.getBoundingClientRect();
                const containerRect = boardContainer.getBoundingClientRect();
                const startX = rect.left - containerRect.left + (rect.width / 2);
                const startY = rect.top - containerRect.top + (rect.height / 2);

                tempLine = document.createElementNS('http://www.w3.org/2000/svg', 'line');
                tempLine.setAttribute('x1', startX);
                tempLine.setAttribute('y1', startY);
                tempLine.setAttribute('x2', startX);
                tempLine.setAttribute('y2', startY);
                tempLine.setAttribute('stroke', '#3b82f6'); 
                tempLine.setAttribute('stroke-width', '4');
                tempLine.setAttribute('stroke-dasharray', '5,5');
                svgOverlay.appendChild(tempLine);
            }
        });

        document.addEventListener('mousemove', function(e) {
            if(isDraggingLine && tempLine) {
                const containerRect = boardContainer.getBoundingClientRect();
                tempLine.setAttribute('x2', e.clientX - containerRect.left);
                tempLine.setAttribute('y2', e.clientY - containerRect.top);
            }
        });

        document.addEventListener('mouseup', function(e) {
            if(isDraggingLine) {
                isDraggingLine = false;
                if(tempLine) { tempLine.remove(); tempLine = null; }

                if(e.target.classList.contains('connect-dot')) {
                    const targetNoteId = e.target.getAttribute('data-id');
                    if(targetNoteId && targetNoteId !== startNoteId) {
                        saveLink(startNoteId, targetNoteId);
                    }
                }
                startNoteId = null;
            }
        });

        // ==========================================
        // 3. Render lines and labels (ของเดิม)
        // ==========================================
        function renderLines() {
            svgOverlay.innerHTML = ''; 
            labelsOverlay.innerHTML = '';
            
            boardLinks.forEach(link => {
                const source = document.querySelector(`.board-note[data-id="${link.source_note_id}"]`);
                const target = document.querySelector(`.board-note[data-id="${link.target_note_id}"]`);

                if(source && target) {
                    const sX = parseFloat(source.getAttribute('data-x')) + (source.offsetWidth / 2);
                    const sY = parseFloat(source.getAttribute('data-y')) + (source.offsetHeight / 2);
                    const tX = parseFloat(target.getAttribute('data-x')) + (target.offsetWidth / 2);
                    const tY = parseFloat(target.getAttribute('data-y')) + (target.offsetHeight / 2);

                    const line = document.createElementNS('http://www.w3.org/2000/svg', 'line');
                    line.setAttribute('x1', sX);
                    line.setAttribute('y1', sY);
                    line.setAttribute('x2', tX);
                    line.setAttribute('y2', tY);
                    line.setAttribute('stroke', '#1f2937'); 
                    line.setAttribute('stroke-width', '3');
                    svgOverlay.appendChild(line);

                    const midX = (sX + tX) / 2;
                    const midY = (sY + tY) / 2;

                    const labelInput = document.createElement('input');
                    labelInput.type = 'text';
                    labelInput.value = link.label || '';
                    labelInput.placeholder = 'ระบุความสัมพันธ์...';
                    
                    labelInput.className = 'absolute bg-white border border-gray-300 rounded-md px-2 py-1 text-xs text-center text-gray-700 shadow-sm transform -translate-x-1/2 -translate-y-1/2 pointer-events-auto focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all w-28 placeholder-gray-300';
                    labelInput.style.left = `${midX}px`;
                    labelInput.style.top = `${midY}px`;
                    
                    labelInput.addEventListener('change', function() {
                        updateLinkLabel(link.id, this.value);
                    });

                    labelsOverlay.appendChild(labelInput);
                }
            });

            document.querySelectorAll('.link-delete-btn').forEach(btn => {
                const nId = btn.getAttribute('data-note-id');
                const hasLinks = boardLinks.some(l => l.source_note_id == nId || l.target_note_id == nId);
                btn.style.display = hasLinks ? 'flex' : 'none';
            });
        }

        // ==========================================
        // 4. API Functions (ของเดิม)
        // ==========================================
        function saveLink(sourceId, targetId) {
            fetch(`/projects/${projectId}/board/links`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' },
                body: JSON.stringify({ source_note_id: sourceId, target_note_id: targetId })
            }).then(res => res.json()).then(data => {
                if(data.success) {
                    boardLinks.push(data.link);
                    renderLines();
                }
            });
        }

        function deleteLinksOfNote(noteId) {
            const linksToDelete = boardLinks.filter(l => l.source_note_id == noteId || l.target_note_id == noteId);
            if(linksToDelete.length === 0) return;
            
            Promise.all(linksToDelete.map(link => {
                return fetch(`/projects/${projectId}/board/links/${link.id}`, {
                    method: 'DELETE',
                    headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' }
                });
            })).then(() => {
                boardLinks = boardLinks.filter(l => l.source_note_id != noteId && l.target_note_id != noteId);
                renderLines();
            });
        }

        function deleteNote(noteId) {
            if(confirm('Delete this card? All connected links will also be deleted.')) {
                fetch(`/projects/${projectId}/board/notes/${noteId}`, { method: 'DELETE', headers: { 'X-CSRF-TOKEN': csrfToken } })
                  .then(res => res.json()).then(data => { if(data.success) location.reload(); });
            }
        }

        function updateNoteContent(noteId, content) {
            fetch(`/projects/${projectId}/board/notes/${noteId}/content`, {
                method: 'PUT',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                body: JSON.stringify({ content: content })
            });
        }

        function updateLinkLabel(linkId, text) {
            fetch(`/projects/${projectId}/board/links/${linkId}/label`, {
                method: 'PUT',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' },
                body: JSON.stringify({ label: text })
            }).then(res => res.json()).then(data => {
                if(data.success) {
                    const linkIndex = boardLinks.findIndex(l => l.id == linkId);
                    if(linkIndex > -1) boardLinks[linkIndex].label = text;
                }
            });
        }

        document.getElementById('resetBoardBtn').addEventListener('click', function() {
            if(!confirm('Are you sure you want to reset the board? This will move all cards to their initial positions and delete all links.')) return;
            
            let linkPromises = boardLinks.map(link => fetch(`/projects/${projectId}/board/links/${link.id}`, { method: 'DELETE', headers: {'X-CSRF-TOKEN': csrfToken} }));
            
            const notes = document.querySelectorAll('.board-note');
            let posPromises = Array.from(notes).map((note, index) => {
                return fetch(`/projects/${projectId}/board/notes/${note.getAttribute('data-id')}/position`, {
                    method: 'PUT',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                    body: JSON.stringify({ pos_x: 20 + (index * 20), pos_y: 20 + (index * 20) })
                });
            });

            Promise.all([...linkPromises, ...posPromises]).then(() => location.reload());
        });

        renderLines();

    </script>
</x-site-layout>