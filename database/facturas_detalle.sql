CREATE TABLE [dbo].[facturas_detalle](
	[idfacdet] [int] IDENTITY(1,1) NOT NULL,
	[idfaccab] [int] NULL,
	[idproducto] [int] NULL,
	[precio] [decimal](10, 2) NULL,
	[cantidad] [int] NULL,
	[subtotal] [decimal](10, 2) NULL,
	[impuesto] [int] NULL,
	[valor_impuesto] [decimal](10, 2) NULL,
	[total] [decimal](10, 2) NULL,
 CONSTRAINT [PK_facturas_detalle] PRIMARY KEY CLUSTERED 
(
	[idfacdet] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO