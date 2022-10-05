/**
 * O DTO é necessario para identificar quais campos seriam recebidos
 * em uma requisição, para por exemplo criar um usuario ou atualizar
 */
export class CreateUserDto {
  nome: string;
  email: string;
  senha: string;
}
