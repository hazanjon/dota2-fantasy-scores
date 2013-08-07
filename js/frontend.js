var dfc = {}; // Namespace

dfc.text = 'jon';
viewModel = function(){
	self = this;
	self.playerData = ko.observableArray(playerData);
	self.matchData = ko.observableArray(matchData);
	
	self.showPlayer = ko.observable(0);

	self.days = [1,2,3,4,5,6,7];
}

dfc.getDayTotal = function(days, day){
	var ret = null;
	var selday = days.byId(day);
	console.log(days, day);
	if(selday)
		ret = selday.total;
	
	return ret;
	
}

if(!Array.prototype.byId) {
	Array.prototype.byId = function(id) {
		id = parseInt(id, 10);
		for(var i = 0; i < this.length; i++) {
			if(typeof this[i].id !== 'undefined' && this[i].id === id)
				return this[i];
		}
		return null;
	}
}

if(!Array.prototype.byValue) {
	Array.prototype.byValue = function(name, val) {
		for(var i = 0; i < this.length; i++) {
			if(this[i][name] === val)
				return this[i];
		}
		return null;
	}
}

if(!Array.prototype.sumValue) {
	Array.prototype.sumValue = function(depth1, depth2) {
		var total = 0;
		for(var i = 0; i < this.length; i++) {
			if(typeof depth2 == 'undefined'){
				total += this[i][depth1];
			}else{
				total += this[i][depth1][depth2];
			}
		}
		return total;
	}
}

if(!String.prototype.capitalize) {
	String.prototype.capitalize = function() {
	    return this.charAt(0).toUpperCase() + this.slice(1);
	}
}
