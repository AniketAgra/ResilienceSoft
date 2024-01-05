class CustomTooltip {
  init(params) {
    const type = params.type || 'primary';
    const data = params.api.getDisplayedRowAtIndex(params.rowIndex).data;
    const eGui = (this.eGui = document.createElement('div'));

    eGui.classList.add('custom-tooltip');
    this.eGui.innerHTML = `
            <div class="panel panel-${type}">
            <div class="panel-body">
             <div class="panel-heading">
           
                     <h3 class="panel-title">${data.athlete}</h3>
                      </div>
                </div>
               
                    <h4 style="white-space: nowrap;">${data.country}</h4>
                    <p>Total: ${data.total}</p>
              
                
            </div>`;
  }

  getGui() {
    return this.eGui;
  }
}