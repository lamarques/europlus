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
        vm.pedido.idcliente = 10;
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
                vm.falhaObservacoes = true;
                return false;
            } else {
                vm.falhaObservacoes = false;
            }
            $http({
                url: '/api/pedidos',
                method: "POST",
                data: vm.pedido
            })
                .then(function (response) {
                        vm.pedidosalvo = true;
                        vm.getTabela();
                    },
                    function (response) {
                        alert('Falha ao salvar pedido');
                    });
        }

        vm.getTabela();
    }]);



