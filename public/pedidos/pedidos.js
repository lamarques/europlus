'use strict';

angular.module('europlusApp.pedidos', ['ngRoute'])

    .config(['$routeProvider', function ($routeProvider) {
        $routeProvider.when('/pedidos', {
            templateUrl: 'pedidos/pedidos.html',
            controller: 'PedidosCtrl'
        });
    }])

    .controller('PedidosCtrl', ['$scope', '$http', function ($scope, $http) {
        var vm = $scope.vm = this;

        vm.dados = [];
        vm.search = '';
        vm.pedido = {};
        vm.getTabela = function () {
            var link = '/api/pedidos';
            if (vm.search != '') {
                link = link + "/" + vm.search;
            }
            $http.get(link).then(function (response) {
                vm.dados = response.data;
            });
        };
        vm.save = function () {
            if (vm.pedido.observacoes == null) {
                vm.falhaObzervacoes = true;
                return false;
            } else {
                vm.falhaObzervacoes = false;
            }
            $http({
                url: '/api/pedidos',
                method: "POST",
                data: vm.pedido
            })
                .then(function (response) {
                        vm.pedidosalvo = true;
                    },
                    function (response) {
                        alert('Falha ao salvar pedido');
                    });
        }

        vm.getTabela();
    }]);



